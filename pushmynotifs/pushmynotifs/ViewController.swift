//
//  ViewController.swift
//  pushmynotifs
//
//  Created by Tarun on 9/5/17.
//  Copyright © 2017 VApp. All rights reserved.
//

import UIKit
import Firebase
import FirebaseMessaging
import FirebaseInstanceID

class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        
        Messaging.messaging().subscribe(toTopic: "/topic/news")
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

