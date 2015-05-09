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
                        <a href="#" class="modal-open" data-toggle="modal" data-target="#myModal"><img src="<?php echo base_url();?>assets/images/btn-calltopickup_normal.png" alt=""/></a>
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

<script src="<?php echo base_url();?>assets/js/script.min.js"></script>

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

                var noti = 0;
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

                    url: "<?php echo base_url();?>assets/images/marker.png",
                    scaledSize: new google.maps.Size(45,60)};

                marker_0 = new google.maps.Marker({
                    map: map,
                    position: carNewLatLng,
                    icon: marker_icon,
                    title: "iFind"
                });

                $.ajax({
                    url: "http://52.74.187.146/ApiTrack/getPercent/"+data.order_id,
                    type: "GET"
                }).done(function(respon) {
                    var obj = JSON.parse(respon);

                    if(obj.distance < 200 && noti == 0){
                        var datanoti = "{'registration_ids':['APA91bGweof8oT3ji0OLLi9j2b1YFXLQTnioOonnCGrjo4Ied-O6bDiEPnnwZkQdkZN7Ke2MxmOKRJzJSE02cXPOte4xW930srZBWRu-NJbGvkIUvyEw0aco3yh6IQP-q8efzcrkGTv9dm2C7buPrES96riXPSIH1_MTL3xXMhmrCWnII-AVlYI'," +
                            "'APA91bFaapvBlonpq99xAS7MO2eDgQLDQNqZadbCUWzhgU9h_gyEkq6Pi7XXotP6oAbniWC6D5HPZqyJqyjCB-Yzb-cHllvou7Hmo3MUmwa9SbrMWjdq1jEHvrrv3zCpAM3DgDBuDeWkOBEPc_PySaTJbaVwEP-aaA'," +
                            "'APA91bFaapvBlonpq99xAS7MO2eDgQLDQNqZadbCUWzhgU9h_gyEkq6Pi7XXotP6oAbniWC6D5HPZqyJqyjCB-Yzb-cHllvou7Hmo3MUmwa9SbrMWjdq1jEHvrrv3zCpAM3DgDBuDeWkOBEPc_PySaTJbaVwEP-aaA']," +
                            "'data': {'order_id': "+data.order_id+",'message': 'Your order will be delivered in 20 minutes.'}}";

                        $.ajax({
                            url: "https://android.googleapis.com/gcm/send",
                            type: "POST",
                            data: JSON.stringify(datanoti),
                            beforeSend: function(xhr){
                                xhr.setRequestHeader('Authorization', 'key=AIzaSyAvHwynUlARS_hU90eMubXscwsDZlH63cE');
                                xhr.setRequestHeader('Content-Type', 'application/json');
                            }
                        }).done(function(respon) {
                            noti++;
                        });
                    }

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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact Information</h4>
      </div>
      <div class="modal-body">
         ITRUEMART <br>
         02-999-9999
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">CALL</button>
      </div>
    </div>
  </div>
</div>
