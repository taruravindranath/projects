//
//  DataService.swift
//  FirebaseBackend
//
//  Created by Tarun on 4/26/18.
//  Copyright © 2018 VApp. All rights reserved.
//

import Foundation
import Firebase

// make a reference, contains the reference for url of the base of our database
let DB_BASE = Database.database().reference()
let STORAGE_BASE = Storage.storage().reference()

class DataService {
    
    // DB References
    // making this a singleton, that's globally accessible
    static let ds = DataService()
    // create common end points
    
    private var _REF_BASE = DB_BASE
    private var _REF_POSTS = DB_BASE.child("posts")
    private var _REF_USERS = DB_BASE.child("users")
    
    //Storage References
    private var _REF_POST_IMAGES = STORAGE_BASE.child("post-pics")
    
    var REF_BASE: DatabaseReference {
        return _REF_BASE
    }
    
    var REF_POSTS: DatabaseReference {
        return _REF_POSTS
    }
    
    var REF_USERS: DatabaseReference {
        return _REF_USERS
    }
    
    var REF_POST_IMAGES: StorageReference {
        return _REF_POST_IMAGES
    }
    
    func createFirebaseDBUser(uid: String, userData: Dictionary<String, String>) {
        // uid does not exist?! no worries firebase will create
        // childvalues updated based on whatever we are passing {...}
        REF_USERS.child(uid).updateChildValues(userData)
    }
    
}
