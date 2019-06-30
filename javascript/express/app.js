//Our first Express App!!
var express = require("express");
var app = express();

// "/" => "Hi there!"
app.get("/", function(req, res) {
  res.send("Hi there!");
});


// "/bye" => "Goodbye!!"
app.get("/bye", function(req, res) {
  res.send("Goodbye!!");
});

// "/dog" => "Woof!!"
app.get("/dog", function(req, res) {
  console.log("Someone made a request to /dog");
  res.send("Woof!!")
});

app.get("/r/:subredditName", function(req, res) {
  // welcome to the ":subredditName" subreddit
  var subreddit = req.params.subredditName;
  res.send("Welcome to the "+ subreddit.toUpperCase() + " subreddit");
});

app.get("/r/:subredditName/comments/:id/:title", function(req, res) {
  console.log(req.params);
  res.send("Welcome to the comments page");
});

app.get("*", function(req, res) {
  res.send("YOU ARE A STAR")
});

app.listen(3000, function() {
  console.log("serving server on port 3000");
});
