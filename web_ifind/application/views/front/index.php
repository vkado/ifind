<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>i F i n d !!</title>

    <!-- Latest compiled and minified CSS -->
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"-->

<!-- Optional theme -->
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css" />

    <script type="text/javascript">
        var baseUrlPath = "<?php echo base_url();?><?php echo (index_page() == '')? '' : index_page()."/" ?>";
    </script>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <!-- <link href="css/scrolling-nav.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-xs-12 mid">

<!--                     <div class="form-group">
                        <div class="icon-addon addon-md">
                            <input type="text" placeholder="Email" class="form-control" id="email">
                            <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>

                        </div>
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div> -->


            <div class="form-group">
                <div class="input-group input-group-sm">
                    <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Enter your order number" class="form-control" id="order">
                        <label for="email" class="glyphicon glyphicon-search" rel="tooltip" title="email"></label>
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" style="margin-left: 16px; width: 63px; background-color: #25589B; color: #FFF;">Find</button>
                    </span>
                </div>
            </div>



                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container-fluid no-padding">
            <div class="row-fluid">
                <div class="col-lg-12 btn-padding">
                    <a href="#"><img id="btn-tracking" src="<?php echo base_url();?>assets/images/btn_myTrackOrder_normal.png" class="clickbtn"></a>
                </div>
            </div>

            <div class="row-fluid">
                <div class="col-lg-12 btn-padding">
                    <a href="#"><img id="btn-customer" src="<?php echo base_url();?>assets/images/btn_customerSupport_normal.png" class="clickbtn"></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-lg-12 footer">
                    <span>iTruemart iFind 1.0.0.0 นะ</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery 
    <script src="js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript 
    <script src="js/bootstrap.min.js"></script>-->

    <script src="<?php echo base_url();?>assets/js/script.min.js"></script>



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