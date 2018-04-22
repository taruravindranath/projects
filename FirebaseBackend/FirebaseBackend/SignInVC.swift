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

class SignInVC: UIViewController {

    @IBOutlet weak var emailField: FancyField!
    
    @IBOutlet weak var pwdField: FancyField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
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
            }
        })
    }
    
    @IBAction func signInBtnPressed(_ sender: Any) {
        if let email = emailField.text, let pwd = pwdField.text {
            Auth.auth().signIn(withEmail: email, password: pwd) { (user, error) in
                if error == nil {
                    print("FBack: Email user authenticated with Firebase")
                } else {
                    Auth.auth().createUser(withEmail: email, password: pwd, completion: { (user, error) in
                        if error != nil {
                            print("FBack: Unable to authenticate with Firebase using email")
                        } else {
                            print("FBack: Successfully authenticated with Firebase")
                        }
                    })
                }
            }
        }
        
        
    }
    
}

