// Our first express assignment
var express = require("express");
var app = express();

app.get("/", function(req, res) {
  res.send("Hi there, welcome to my assignment");
});

app.get("/speak/:animal", function(req, res) {
  var sounds = {
    pig: "Oink",
    cow: "Moo",
    dog: "Woof Woof!",
    cat: "I hate you human",
    goldfish: "..."
  };

  var animal = req.params.animal.toLowerCase();
  var sound = sounds[animal];
  res.send("The " + animal + " says `" + sound + "`");
})

app.get("/repeat/:repeat/:textCount", function(req, res) {
  // better naming would be message, times
  var strToRepeat = req.params.repeat;
  var textCount = Number(req.params.textCount);

  var response = "";
  for (var i = 0; i<=textCount; i++) {
    response += strToRepeat+" ";
  }

  res.send(response);
});

app.get("*", function(req, res) {
  res.send("Sorry page not found...What are you doing in your life");
});

app.listen(3000, function() {
  console.log("Serving server on PORT 3000")
});
