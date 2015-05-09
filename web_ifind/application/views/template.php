<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>i F i n d !!</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css" />

    <script type="text/javascript">
        var baseUrlPath = "<?php echo base_url();?><?php echo (index_page() == '')? '' : index_page()."/" ?>";
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


<?php
$this->load->view($main);
?>


<footer>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-lg-12 footer">
                <span>iTruemart iFind 1.0.0.0</span>
            </div>
        </div>
    </div>
</footer>






<script>
    $("#btn-tracking")
        .mouseup(function() {
            $(this).attr({
                src: "<?php echo base_url();?>assets/images/btn_myTrackOrder_normal.png"
            });
        })
        .mousedown(function() {
            $(this).attr({
                src: "<?php echo base_url();?>assets/images/btn_myTrackOrder_pressed.png"
            });
        });

    $("#btn-customer")
        .mouseup(function() {
            $(this).attr({
                src: "<?php echo base_url();?>assets/images/btn_customerSupport_normal.png"
            });
        })
        .mousedown(function() {
            $(this).attr({
                src: "<?php echo base_url();?>assets/images/btn_customerSupport_pressed.png"
            });
        });

</script>



</body>

</html>