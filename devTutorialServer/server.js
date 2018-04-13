var express = require('express');
var bodyParser = require('body-parser');
var app = express();

app.all('/*', function(req, res, next){
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Headers', 'X-Requested-With', 'Content-Type', 'Accept');
  res.header('Access-Control-Allow-Methods', 'POST', 'GET');
  next();
});

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

var tutorials = [
  {
    id: 1,
    title: 'Android Studio Video Tutorial',
    description: "Learn how to install Android studio and go throught this tutorial to buid your app",
    iframe: '<iframe width="560" height="315" src="https://www.youtube.com/embed/F-k5gwz_91o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
  },
  {
    id: 2,
    title: 'Ios Tutorial Beginner Tutorial',
    description: 'Learn how to develop Iphone apps',
    iframe: '<iframe width="560" height="315" src="https://www.youtube.com/embed/1ilsDnYC-B8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
  }
];


app.get('/tutorials', function(req, res) {
  console.log('GET from server');
  res.send(tutorials);
});

app.listen(8819);
