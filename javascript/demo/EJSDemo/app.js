var express = require("express");
var app = express();

// tells express to serve content of public directory
app.use(express.static("public"));
// to not include .ejs everytime
app.set("view engine", "ejs");

app.get("/", function(req, res) {
  res.render("home");
});

app.get("/fallinlovewith/:thing", function(req, res) {
    var thing = req.params.thing;
    res.render("love", {thingVar: thing});
});

app.get("/posts", function(req, res) {
    var posts = [
      {title: "Post1", author: "Susy"},
      {title: "My adorable softy", author: "Tarun"},
      {title: "Can you believe this pomsky?", author: "Colt"},
    ];

    res.render("posts", {posts: posts});
});

app.listen(3000, function() {
  console.log("Server is listening!!!");
});
