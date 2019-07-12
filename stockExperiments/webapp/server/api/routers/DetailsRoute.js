const express = require('express');

const router = express.Router();

const DetailsController = require('../controllers/DetailsController');

router.get('/get-earnings-calendar', (req, res, next) => {
  const detailsController = new DetailsController();
  detailsController.getEarningsCalendar(req, res, next);
});

module.exports = router;

