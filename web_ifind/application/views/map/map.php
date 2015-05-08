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

        var userMarker = {};
        var carMarker = {};

        var urlHost = '<?php echo NODE_URL; ?>';

        var socket = io.connect(urlHost);
        socket.on('connect', function(){
            console.log('client connected');
            socket.emit('subscribe', {channel: <?php echo $order; ?>});
        });


        socket.on('message', function(data){

            var marker_count = markers_map.length - 1;

            for (var i = 0; i < markers_map.length; i++) {
                if(map.getBounds().contains(markers_map[marker_count].getPosition())){
                    if(markers_map[i].title == 'iFind'){
                        carMarker = markers_map[i];
                    }
                    //userMarker = markers_map[marker_count];
                    //carMarker = markers_map[0];
                }
            }

            if(carMarker){

                var carLastLatLng = new google.maps.LatLng(carMarker.position.A, carMarker.position.F);
                var carNewLatLng = new google.maps.LatLng(data.lat, data.long);

                var runnningPlanCoordinates = [
                    carLastLatLng,
                    carNewLatLng
                ];

                var runningPath = new google.maps.Polyline({
                    path: runnningPlanCoordinates,
                    strokeColor: '#00B2EE',
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                });

                runningPath.setMap(map);

                marker_0.setMap(null);

                var marker_icon = {
                    url: "http://image.weevirus.com/googlecar.png",
                    scaledSize: new google.maps.Size(20,20)};

                marker_0 = new google.maps.Marker({
                    map: map,
                    position: carNewLatLng,
                    icon: marker_icon,
                    title: "iFind",
                    animation:  google.maps.Animation.DROP
                });
            }

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

        var circleUserOptions = {
            strokeColor: "0.8",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.3,
            map: map,
            center: userLatlng,
            radius: 1000
        };
        draw_circle = new google.maps.Circle(circleUserOptions);

        var markerUserOptions = {
            map: map,
            position: userLatlng,
            icon: user_marker_icon,
            title: 'User',
            animation:  google.maps.Animation.DROP
        };
        var userMarker = createMarker_map(markerUserOptions);

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