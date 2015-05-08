<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ifinder.css"/>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="shipped-detail">
                <ul class="list-unstyled list-status">
                    <li class="item-status col-1 col-xs-4">
                        <p class="text-status">Shipped from.</p>
                        <span class="order-no">AIA</span>
                    </li>
                    <li class="item-status col-2 col-xs-4">
                        <p class="text-status">Destination</p>
                        <span class="order-no">Espanade Ratchada</span>
                    </li>
                    <li class="item-status col-3 col-xs-4">
                        <img src="<?php echo base_url();?>assets/images/btn-calltopickup_normal.png" alt=""/>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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

        var carMarker = [];

        var urlHost = '<?php echo NODE_URL; ?>';

        var socket = io.connect(urlHost);
        socket.on('connect', function(){
            console.log('client connected');
            socket.emit('subscribe', {channel: <?php echo $order; ?>});
        });


        socket.on('message', function(data){

            if(carMarker.length < 1){

                var marker_count = markers_map.length - 1;

                for (var i = 0; i < markers_map.length; i++) {
                    if(map.getBounds().contains(markers_map[marker_count].getPosition())){
                        console.log(markers_map[i]);
                        if(markers_map[i].title == 'iFind'){
                            carMarker = markers_map[i];
                        }
                    }
                }
            }


            if(carMarker){

                var carLastLatLng = new google.maps.LatLng(carMarker.position.A, carMarker.position.F);
                var carNewLatLng = new google.maps.LatLng(data.lat, data.long);

                carMarker.position.A = data.lat;
                carMarker.position.F = data.long;

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
                    title: "iFind"
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
            radius: 100
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