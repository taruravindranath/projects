const express = require('express');

const DetailsRouter = require('./routers/DetailsRoute');
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


router.use('/details/', DetailsRouter);

module.exports = router;