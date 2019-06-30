const pathToRegexp = require('path-to-regexp');

class AuthController {
  allowThankYouPage(req, res, next) {
    return next();
  }
}

module.exports = AuthController;
