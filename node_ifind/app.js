var METHOD_PUBLISH_FEED = '/location';
var METHOD_ONE_KILO_BACK = '/onekilo';

/**
 * Module dependencies.
 */

var express = require('express')
	, routes = require('./routes')
	, user = require('./routes/user')
    , http = require('http')
	, https = require('https')
	, path = require('path')
	, io = require('socket.io')
	, redis = require('redis')
	, mysql = require('mysql')
	, fs = require('fs');

var app = express();

app.configure(function(){
	app.set('port', process.env.PORT || 3000);
	app.set('views', __dirname + '/views');
	app.set('view engine', 'jade');
	app.use(express.favicon());
	//app.use(express.logger('dev'));
	app.use(express.bodyParser());
	app.use(express.methodOverride());
	app.use(app.router);
	app.use(express.static(path.join(__dirname, 'public')));
});

app.configure('development', function(){
	app.use(express.errorHandler());
});

app.get('/', routes.index);
app.get('/users', user.list);

//var server = https.createServer(options, app);
var server = http.createServer(app);
io = io.listen(server);
server.listen(app.get('port'), function(){
	console.log("Express server listening on port " + app.get('port'));
});

var sqlcon = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'ifind'
});
sqlcon.connect();

function updateLocation(data)
{

    var point = data.lat+","+data.long;

    var sql = "INSERT INTO location (order_id, lat, `long`, point, date_added) " +
    "VALUES ("+sqlcon.escape(data.order_id)+", "+sqlcon.escape(data.lat)+", "+sqlcon.escape(data.long)+", "+sqlcon.escape(point)+", NOW())";

	sqlcon.query(sql, function(err, rows){
		if(err){
			console.log(err);
			return;
		}
		console.log(rows);
		if(rows.length < 1)
		{
			return;
		}
		console.log('order valid: ' + data.order_id);
	});
}

io.sockets.on('connection', function(socket){
	socket.on('subscribe', function(data){

        if(!data || !data.channel)
			return;

        console.log('client connected');
        socket.join(data.channel);
    });

    socket.on('disconnect', function() {
        console.log('client disconnected');
    })
});

var auth = express.basicAuth(function(user, pass){
	return user === 'ifind' && pass === 'ifindpassword';
});

//publish event through post request
app.post(METHOD_PUBLISH_FEED, function(req, res){

    updateLocation(req.body);

    io.sockets.in(req.body.order_id).emit('message', req.body);
	res.send(200);
});

app.post(METHOD_ONE_KILO_BACK, function(req, res){

    console.log(reqbody);

    res.send(200);
});