var express = require("express");
var app = express();
var bodyParser = require("body-parser");

// friends list app

// tells express to serve content of public directory
app.use(express.static("public"));
// use bodyParser to fetch form data
app.use(bodyParser.urlencoded({extended: true}));
// to not type .ejs everytime
app.set("view engine", "ejs");

var friends = ["Shaun", "Sun", "Nick", "Lily"];

app.get("/", function(req, res) {
  // render function fetches from view folder in express
  res.render("home");
});

"/friends"
app.get("/friends", function(req, res) {
  res.render("friends", {friends: friends});
});

"create a new friend"
app.post("/addfriend", function(req, res) {
  var newFriend = req.body.newfriend;
  friends.push(newFriend);
  res.redirect("/friends");
});

app.listen(3000, function() {
  console.log("Server started!!");
});
