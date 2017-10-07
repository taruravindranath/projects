//
//  Constants.swift
//  rainyshinycloudy
//
//  Created by Tarun on 9/28/17.
//  Copyright © 2017 VApp. All rights reserved.
//

import Foundation

let BASE_URL = "http://api.openweathermap.org/data/2.5/weather?"
let LATITUDE = "lat="
let LONGITUDE = "&lon="
let APPID = "&appid="
let APIKEY = "387214b574d9ab93e884982cc67c40ed"

typealias DownloadComplete = () -> ()

let CURRENT_WEATHER_URL = "http://api.openweathermap.org/data/2.5/weather?lat=\(Location.sharedInstance.latitude!)&lon=\(Location.sharedInstance.longitude!)&appid=387214b574d9ab93e884982cc67c40ed"

let FORECAST_URL = "http://samples.openweathermap.org/data/2.5/forecast/daily?lat=\(Location.sharedInstance.latitude!)&lon=\(Location.sharedInstance.longitude!)&cnt=10&appid=b1b15e88fa797225412429c1c50c122a1"
