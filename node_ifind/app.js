var METHOD_PUBLISH_FEED = '/location';

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
	//, mysql = require('mysql')
	, fs = require('fs');

//special parser for the activity feed
function feedParser(req, res, next){
    //console.log('feedParser!');
	if(req.originalUrl.substr(0, METHOD_PUBLISH_FEED.length).toLowerCase() != METHOD_PUBLISH_FEED)
		return next();
	var data = '';
	req.setEncoding('utf8');
	req.on('data', function(chunk){
		data += chunk;
	});
	req.on('end', function(){
		req.body = data;
		next();
	})
}

var app = express();

app.configure(function(){
	app.set('port', process.env.PORT || 3000);
	app.set('views', __dirname + '/views');
	app.set('view engine', 'jade');
	app.use(express.favicon());
	//app.use(express.logger('dev'));
	app.use(express.bodyParser());
	app.use(express.methodOverride());
	app.use(feedParser);
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

/*var sqlcon = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'ifind'
});
sqlcon.connect();*/

function updateLocation(channel, callback)
{
	if(!channel)
	{
		callback('channel is not invalid', channel);
		return;
	}
	if(channel.slice(0, 'http'.length) == 'http')
	{
		callback('channel cannot begins with [http]', channel);
		return;
	}
	if(channel.slice(0, 'www'.length) == 'www')
	{
		callback('channel cannot begins with [www]', channel);
		return;
	}
	var sql = 'SELECT device_id FROM locaiton WHERE device_id = ' + sqlcon.escape(channel);
	sqlcon.query(sql, function(err, rows){
		if(err){
			console.log(err);
			callback(err);
			return;
		}
		console.log(rows);
		if(rows.length < 1)
		{
			callback('channel does not exist', channel);
			return;
		}
		console.log('domain valid: ' + rows[0].domain_name);
		callback(null, channel)
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
app.post(METHOD_PUBLISH_FEED, auth, function(req, res){

    console.log(req.body);

    io.sockets.in(10001).emit('message', 'yeah');
	res.send(200);
});