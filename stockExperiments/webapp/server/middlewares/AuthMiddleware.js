const Cookie = require('universal-cookie');
const md5 = require('md5');
const util = require('util');
const BaseMiddleware = require('./BaseMiddleware');

class AuthMiddleware extends BaseMiddleware {
  async handleRequest(req, res, next) {
    next();
  }
}

module.exports = AuthMiddleware;

