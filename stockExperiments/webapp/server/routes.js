const routes = require('next-routes');

const pageNameConfig = require('./serverConfig/pageNameConfig');

const paths = routes()
  .add(pageNameConfig.SITE_LOGIN_INDEX, '/login', 'login')
  // home page
  .add(pageNameConfig.SITE_INDEX_INDEX, '/', 'home')
module.exports = paths;
