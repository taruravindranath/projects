const express = require('express');
const path = require('path');
const next = require('next');
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
const detector = require('spider-detector');
const compression = require('compression');
const useragent = require('express-useragent');

const routes = require('./server/routes');
const Api = require('./server/api');
const AuthMiddleware = require('./server/middlewares/AuthMiddleware');

const port = parseInt(process.env.PORT, 10) || 3000;
const dev = process.env.NODE_ENV !== 'production';
const app = next({ dir: '.', dev });
const handler = routes.getRequestHandler(app);

app.prepare()
  .then(() => {
    const server = express();
    server.use(compression());
    server.use(useragent.express());
    server.enable('trust proxy');
    server.use(bodyParser.json());
    server.use('/pubimages/', express.static(path.join(__dirname, `public/images/`)));
    server.use(cookieParser());
    server.use(express.static(path.join(__dirname, 'public')));
    server.use(detector.middleware());
    server.use(Api);

    server.use((req, res, next) => {
      const authMiddleware = new AuthMiddleware();
      authMiddleware.index(req, res, next);
    });

    server.use(handler);

    server.listen(port, (err) => {
      if (err) throw err;
      console.log(`> Ready on http://localhost:${port}`);
    });
  });