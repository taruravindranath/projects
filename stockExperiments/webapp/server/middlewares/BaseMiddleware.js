const pathToRegexp = require('path-to-regexp');
const { sprintf } = require('sprintf-js');

const ResponseLocals = require('../constant/responseLocals');
const routes = require('../routes');

class BaseMiddleware {
  constructor() {
  }

  index(req, res, next) {
    if (this.skipMiddleware(res)) {
      next();
    } else {
      this.handleRequest(req, res, next);
    }
  }

  skipMiddleware(res) {
    return false;
  }

  getUrl(urlPattern, args) {
    return sprintf(urlPattern, args);
  }

  setMember(res, member) {
    res.locals[ResponseLocals.MEMBER] = member;
  }
}

module.exports = BaseMiddleware;
