var app = require('http').createServer(handler)
var io = require('socket.io')(app);
var fs = require('fs');

app.listen(3030);

function handler (req, res) {
  fs.readFile(__dirname + '/index.html',
  function (err, data) {
    if (err) {
      res.writeHead(500);
      return res.end('Error loading index.html');
    }

    res.writeHead(200);
    res.end(data);
  });
}


io.on('connection', function (socket) {

    socket.on('SendText',function (text) { 
    console.log(text+'.');

        io.emit('typeText',text);

     })


     socket.on('emmitMoveBall',function (x,y) { 
      // console.log(text+'.');

        io.emit('onMoveBall',x,y);

     })


     socket.on('emitPumBall',function (x,y) { 
        io.emit('onPumBall',x,y);

     })

});