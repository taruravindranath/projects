const express = require('express');

const router = express.Router();

const AuthController = require('../controllers/AuthController');

router.get('/auth/cleanup', (req, res, next) => {
  const authController = new AuthController();
  authController.allowThankYouPage(req, res, next);
});

module.exports = router;

