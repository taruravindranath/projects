const express = require('express');
const fastJson = require('fast-safe-stringify');

const AuthRouter = require('./routers/AuthRoute');
const ResponseLocals = require('../constant/responseLocals');

const dev = process.env.NODE_ENV !== 'production';
const router = express.Router();

const encodeQueryUrl = function (data) {
  return Object.keys(data).map(key => (
    [key, data[key]].map(encodeURIComponent).join('=')
  )).join('&');
};

router.get('/health', (req, res, next) => {
  res.send(`I'm is alive and I'm ${GetMediaCode()}`);
});

router.use('/user/', AuthRouter);

module.exports = router;