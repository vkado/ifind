<div>
    <?php
    echo form_open('tracking#order');
    ?>
    <div class="form-group form-group-lg">
        <div class="col-md-6">
            <input type="text" class="form-control" name="order" id="order" value="<?php echo $order; ?>" placeholder="<?php echo $this->lang->line('search_order_id'); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <?php echo anchor('', $this->lang->line('search'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
    </div>
    <?php
    echo form_close();
    ?>
</div>

<div id="map-info">
    <?php echo $map['js']; ?>
    <?php echo $map['html']; ?>
</div>

<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<?php
if($order){
?>
    <script type="text/javascript">

        var urlHost = 'http://localhost:3000';

        var socket = io.connect(urlHost);
        socket.on('connect', function(){
            console.log('client connected');
            socket.emit('subscribe', {channel: <?php echo $order; ?>});
        });


        socket.on('message', function(data){
//        data = JSON.parse(data);
            console.log(data);
        });

    </script>
<?php
}
?>
<script type="text/javascript">
    var carLocationsLat = '<?php echo $lat; ?>';
    var carLocationsLong = '<?php echo $long; ?>';

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        alert("Not Supported!");
    }

    function success(position) {

        var user_marker_icon = {
            url: "http://image.weevirus.com/3d-human-ok.png",
            scaledSize: new google.maps.Size(30,30)};

        carLocationsLat = position.coords.latitude;
        carLocationsLong = position.coords.longitude;

        var userLatlng = new google.maps.LatLng(carLocationsLat,carLocationsLong);

        var draw_circle = null;

        var circleOptions = {
            strokeColor: "0.8",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.3,
            map: map,
            center: userLatlng,
            radius: 1000
        };
        draw_circle = new google.maps.Circle(circleOptions);

        var markerOptions = {
            map: map,
            position: userLatlng,
            icon: user_marker_icon,
            title: 'Hello World!',
            animation:  google.maps.Animation.DROP
        };
        var userMarker = createMarker_map(markerOptions);

<?php
if(empty($order)){
?>
        var myLatlng = new google.maps.LatLng(carLocationsLat, carLocationsLong);
        google.maps.event.addDomListener(window, "resize", function() { map.setCenter(myLatlng); }); // Keeps the Pin Central when resizing the browser on responsive sites
<?php
}
?>
    }

    function error(msg) {
        console.log(typeof msg == 'string' ? msg : "error");
    }

    var watchId = navigator.geolocation.watchPosition(function(position) {
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
    });

    navigator.geolocation.clearWatch(watchId);

    var myLatlng = new google.maps.LatLng(carLocationsLat, carLocationsLong);
    google.maps.event.addDomListener(window, "resize", function() { map.setCenter(myLatlng); }); // Keeps the Pin Central when resizing the browser on responsive sites
</script>