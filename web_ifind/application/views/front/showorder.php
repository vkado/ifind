<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/ifinder.css"/> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/ifinder.css" />
    <script src="<?php echo base_url();?>assets/js/libs/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/bootstrap.min.js"></script>
    <title></title>
    <script type="text/javascript">
        $ ( function () {
            $ ( '.percent-amount' ).each ( function () {
                var percent = $ ( this ).text (),
                        match = percent.match ( /100%/ );

                if (match !== null && match.length) {
                    $ ( this ).parent ().addClass ( 'complete' );
                }

                $ ( this ).parent ().width ( percent );
            } );

            $ ( '.percent-amount' ).bind ( "DOMSubtreeModified", function () {
                var percent = $ ( this ).text (),
                        match = percent.match ( /100%/ );

                if (match !== null && match.length) {
                    $ ( this ).parent ().addClass ( 'complete' );
                } else {
                    $ ( this ).parent ().removeClass ( 'complete' );
                }

                $ ( this ).parent ().width ( percent );
            } );

        } );
    </script>

    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<?php
if($order_id){
?>
    <script type="text/javascript">

        var userMarker = {};
        var carMarker = {};

        var urlHost = '<?php echo NODE_URL; ?>';

        var socket = io.connect(urlHost);
        socket.on('connect', function(){
            console.log('client connected');
            socket.emit('subscribe', {channel: <?php echo $order_id; ?>});
        });


        socket.on('message', function(data){
            console.log(data.order_id);
            $.ajax({
                url: "http://52.74.187.146/ApiTrack/getPercent/"+data.order_id,
                type: "GET",
            }).done(function(respon) {
                console.log(respon);
                // {"percent":38.14,"order_date":"2015-05-08 13:00:00","duration":842}

                // respon.json.
                var obj = JSON.parse(respon);

                $("#percent-display").html(obj.percent+'<i>%</i>');
            });

        });

    </script>
<?php
}
?>    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-9 form-group-search">
                            <span class="glyphicon glyphicon-search"></span>
                            <input type="text" class="form-control input-search"/>
                        </div>
                        <div class="col-xs-3">
                            <button class="btn-search">
                                Find
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="box-status">
            <h3 class="title-name">Recent</h3>

            <div class="status-information">
                <ul class="list-unstyled list-status">
                    <li class="item-status col-1">
                        <p class="text-status">Order no.</p>
                        <span class="order-no"><?php echo $order_id;?></span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Order date</p>
                        <span class="text-default"><?php echo $order_date;?></span>
                    </li>
                    <li class="item-status col-3">
                        <p class="text-status">Delivery status</p>
                        <span class="delivery-status">Shipped</span>
                    </li>
                    <li class="item-status col-1">
                        <p class="text-status">Qty. (items)</p>
                        <span class="text-default">6</span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Estimated delivery</p>
                        <span class="text-default"><?php echo $estimated_delivery;?></span>
                    </li>
                </ul>
                <span class="glyphicon glyphicon-chevron-right"></span>
                <div class="percent-complete">
                    <div class="line outer">
                        <ul class="list-unstyled">
                            <li>.</li>
                            <li>.</li>
                            <li>.</li>
                            <li>.
                                <span class="span pull-right">.</span>
                            </li>
                        </ul>
                        <div class="inner" style="width: 100%">
                            <div class="percent-amount" id="percent-display">
                                <?php echo $percent;?><i>%</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-status">
            <h3 class="title-name">History</h3>

            <div class="status-information">
                <ul class="list-unstyled list-status">
                    <li class="item-status col-1">
                        <p class="text-status">Order no.</p>
                        <span class="order-no">847112</span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Order date</p>
                        <span class="text-default">26/03/15 14:20:45</span>
                    </li>
                    <li class="item-status col-3">
                        <p class="text-status">Delivery status</p>
                        <span class="delivery-status">Shipped</span>
                    </li>
                    <li class="item-status col-1">
                        <p class="text-status">Qty. (items)</p>
                        <span class="text-default">6</span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Estimated delivery</p>
                        <span class="text-default">29/03/15</span>
                    </li>
                </ul>
                <span class="glyphicon glyphicon-chevron-right"></span>
                <div class="percent-complete">
                    <div class="line outer">
                        <ul class="list-unstyled">
                            <li>.</li>
                            <li>.</li>
                            <li>.</li>
                            <li>.
                                <span class="span pull-right">.</span>
                            </li>
                        </ul>
                        <div class="inner">
                            <div class="percent-amount">
                                38<i>%</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-status">
            <div class="status-information">
                <ul class="list-unstyled list-status">
                    <li class="item-status col-1">
                        <p class="text-status">Order no.</p>
                        <span class="order-no">847112</span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Order date</p>
                        <span class="text-default">26/03/15 14:20:45</span>
                    </li>
                    <li class="item-status col-3">
                        <p class="text-status">Delivery status</p>
                        <span class="delivery-status">Shipped</span>
                    </li>
                    <li class="item-status col-1">
                        <p class="text-status">Qty. (items)</p>
                        <span class="text-default">6</span>
                    </li>
                    <li class="item-status col-2">
                        <p class="text-status">Estimated delivery</p>
                        <span class="text-default">29/03/15</span>
                    </li>
                </ul>
                <span class="glyphicon glyphicon-chevron-right"></span>
                <div class="percent-complete">
                    <div class="line outer">
                        <ul class="list-unstyled">
                            <li>.</li>
                            <li>.</li>
                            <li>.</li>
                            <li>.
                                <span class="span pull-right">.</span>
                            </li>
                        </ul>
                        <div class="inner">
                            <div class="percent-amount">
                                17<i>%</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>