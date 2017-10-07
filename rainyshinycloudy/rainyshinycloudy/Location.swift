//
//  Location.swift
//  rainyshinycloudy
//
//  Created by Tarun on 10/7/17.
//  Copyright © 2017 VApp. All rights reserved.
//

import CoreLocation

class Location {
    static var sharedInstance = Location()
    private init() {}
    
    var latitude: Double!
    var longitude: Double!
}
