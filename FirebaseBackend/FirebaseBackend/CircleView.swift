//
//  CircleView.swift
//  FirebaseBackend
//
//  Created by Tarun on 4/22/18.
//  Copyright © 2018 VApp. All rights reserved.
//

import UIKit

class CircleView: UIImageView {

    override func layoutSubviews() {
        layer.cornerRadius = self.frame.width / 2
    }

}
