//
//  FancyView.swift
//  FirebaseBackend
//
//  Created by Tarun on 4/19/18.
//  Copyright © 2018 VApp. All rights reserved.
//

import UIKit

class FancyView: UIView {
    override func awakeFromNib() {
        super.awakeFromNib()
        
        layer.shadowColor = UIColor(red: SHADOW_GRAY, green: SHADOW_GRAY, blue: SHADOW_GRAY, alpha: 0.6).cgColor
        layer.shadowOpacity = 0.8
        layer.shadowRadius = 5.0
        layer.shadowOffset = CGSize(width: 1.0, height: 1.0)
        
    }
}
