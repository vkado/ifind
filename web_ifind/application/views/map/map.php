<div>
    <?php
    echo form_open('tracking');
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


<script type="text/javascript">
    var myLatlng = new google.maps.LatLng(<?php echo $point; ?>);
    google.maps.event.addDomListener(window, "resize", function() { map.setCenter(myLatlng); }); // Keeps the Pin Central when resizing the browser on responsive sites
</script>
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script type="text/javascript">

    var urlHost = 'http://localhost:3000';

    var socket = io.connect(urlHost);
    socket.on('connect', function(){
        console.log('client connected');
        socket.emit('subscribe', {channel: <?php echo $device_id; ?>});
    });


    socket.on('message', function(data){
//        data = JSON.parse(data);
        console.log(data);
    });

</script>
<script>

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    } else {
        alert("Not Supported!");
    }

    function success(position) {

        var user_marker_icon = {
            url: "http://image.weevirus.com/3d-human-ok.png",
            scaledSize: new google.maps.Size(30,30)};

        var userLatlng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);

        var markerOptions = {
            map: map,
            position: userLatlng,
            icon: user_marker_icon,
            title: 'Hello World!',
            animation:  google.maps.Animation.DROP
        };
        var userMarker = createMarker_map(markerOptions);

    }

    function error(msg) {
        console.log(typeof msg == 'string' ? msg : "error");
    }

    var watchId = navigator.geolocation.watchPosition(function(position) {
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
    });

    navigator.geolocation.clearWatch(watchId);

</script>