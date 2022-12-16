//index.js
var express = require("express");
var socket = require("socket.io");

var app = express();

var port = 3000;

var server = app.listen(port, function () {
  console.log("Listening at http://localhost:" + port);
});



app.use(express.static("public"));

var sock = socket(server, {
  cors: {
    origin: '*',
  }
});
// sock.origins('*:*')
sock.on("connection", function (socket) {
  console.log("made connection with socket " + socket.id);

  // when the server receives a chat event
  socket.on("chat", function (data) {
    // use emit to send the “chat” event to everybody that is connected, including the sender
    sock.sockets.emit("chat", data);
  });
  socket.on("typing", function (data) {
    if (data.typing == true) {
      sock.sockets.emit('display', data);
    } else {
      sock.sockets.emit('display', data);
    }
  })


});

