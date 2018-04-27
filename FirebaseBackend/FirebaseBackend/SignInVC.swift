//
//  ViewController.swift
//  FirebaseBackend
//
//  Created by Tarun on 4/12/18.
//  Copyright © 2018 VApp. All rights reserved.
//

import UIKit
import FBSDKCoreKit
import FBSDKLoginKit
import Firebase
import SwiftKeychainWrapper

class SignInVC: UIViewController {

    @IBOutlet weak var emailField: FancyField!
    
    @IBOutlet weak var pwdField: FancyField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // view did load cannot perform segways because its too early
    }
    
    override func viewDidAppear(_ animated: Bool) {
        if let _ = KeychainWrapper.standard.string(forKey: KEY_UID) {
            performSegue(withIdentifier: "goToFeed", sender: nil)
        }
    }
    @IBAction func facebookBtnPressed(_ sender: Any) {
        // on tapping the btn
        let facebookLogin = FBSDKLoginManager()
        
        facebookLogin.logIn(withReadPermissions: ["email"], from: self) { (result, error) in
            if error != nil {
                print("FBack: Unable to authenticate with Facebook")
            } else if result?.isCancelled == true {
                print("FBack: User cancelled Facebook authentication")
            } else {
                print("FBack: Successfully authenticated with Facebook")
                // to get credential for facebook once it's successfully loaded
                let credential = FacebookAuthProvider.credential(withAccessToken: FBSDKAccessToken.current().tokenString)
                // authenticated with facebook, now authenticate with firebase
                self.firebaseAuthenticate(credential)
            }
        }
    }
    
    func firebaseAuthenticate(_ credential: AuthCredential) {
        Auth.auth().signIn(with: credential, completion: { (user, error) in
            if error != nil {
                print("FBack: Unable to authenticate with Firebase - \(error ?? "Some other reason" as! Error)")
            } else {
                print("FBack: Successfully authenticated with Firebase")
                if let user = user {
                    let userData = ["provider": credential.provider]
                    self.completeSignIn(id: user.uid, userData: userData)
                }
            }
        })
    }
    
    @IBAction func signInBtnPressed(_ sender: Any) {
        if let email = emailField.text, let pwd = pwdField.text {
            Auth.auth().signIn(withEmail: email, password: pwd) { (user, error) in
                if error == nil {
                    print("FBack: Email user authenticated with Firebase")
                    if let user = user {
                        let userData = ["provider": user.providerID]
                        self.completeSignIn(id: user.uid, userData: userData)
                    }
                } else {
                    Auth.auth().createUser(withEmail: email, password: pwd, completion: { (user, error) in
                        if error != nil {
                            print("FBack: Unable to authenticate with Firebase using email")
                        } else {
                            print("FBack: Successfully authenticated with Firebase")
                            if let user = user {
                                let userData = ["provider": user.providerID]
                                self.completeSignIn(id: user.uid, userData: userData)
                            }
                        }
                    })
                }
            }
        }
    }
    
    func completeSignIn(id: String, userData: Dictionary<String, String>) {
        // putting data in DB
        DataService.ds.createFirebaseDBUser(uid: id, userData: userData)
        // putting data into keychain
        let keychainResult = KeychainWrapper.standard.set(id, forKey: KEY_UID)
        print("FBack: Data saved to Keychain \(keychainResult)")
        performSegue(withIdentifier: "goToFeed", sender: nil)
    }
    
}

