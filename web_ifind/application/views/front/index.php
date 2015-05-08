<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>i F i n d !!</title>

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
        <style type="text/css">
           .intro-section {
              height: 50%;
              padding-top: 0px;
              text-align: center;
              background: #FFFFFF;
              background-image: url(./images/img-mainbg-01.png);
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }

          .about-section {
              height: initial;
              padding-top: 0px;
              text-align: center;
              background: #FFF;
            }

          .center-block {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }

        .input-group .icon-addon .form-control {
            border-radius: 0;
        }

        .icon-addon {
            position: relative;
            color: #555;
            display: block;
        }

        .icon-addon:after,
        .icon-addon:before {
            display: table;
            content: " ";
        }

        .icon-addon:after {
            clear: both;
        }

        .icon-addon.addon-md .glyphicon,
        .icon-addon .glyphicon, 
        .icon-addon.addon-md .fa,
        .icon-addon .fa {
            position: absolute;
            z-index: 2;
            left: 10px;
            font-size: 14px;
            width: 20px;
            margin-left: -2.5px;
            text-align: center;
            padding: 10px 0;
            top: 1px
        }

        .icon-addon.addon-lg .form-control {
            line-height: 1.33;
            height: 46px;
            font-size: 18px;
            padding: 10px 16px 10px 40px;
        }

        .icon-addon.addon-sm .form-control {
              height: 39px;
              padding: 5px 10px 5px 28px;
              font-size: 12px;
              line-height: 2.5;
            }

        .icon-addon.addon-lg .fa,
        .icon-addon.addon-lg .glyphicon {
            font-size: 18px;
            margin-left: 0;
            left: 11px;
            top: 4px;
        }

        .icon-addon.addon-md .form-control,
        .icon-addon .form-control {
            padding-left: 30px;
            float: left;
            font-weight: normal;
        }

        .icon-addon.addon-sm .fa, .icon-addon.addon-sm .glyphicon {
          margin-left: 0;
          font-size: 12px;
          left: 5px;
          top: 3px;
        }

        .icon-addon .form-control:focus + .glyphicon,
        .icon-addon:hover .glyphicon,
        .icon-addon .form-control:focus + .fa,
        .icon-addon:hover .fa {
            color: #2580db;
        }

        .mid {
          margin-top: 37%;
        }

        .input-group-sm>.form-control, .input-group-sm>.input-group-addon, .input-group-sm>.input-group-btn>.btn {
          height: 39px;
          padding: 5px 10px;
          font-size: 12px;
          line-height: 1.5;
          border-radius: 3px;
        }

        img.clickbtn {
          width: 100%;
        }

        .no-padding {
          padding: 0px !important;
        }

        .btn-padding {
          padding: 10px;
          padding-left: 25px;
          padding-right: 25px;
        }

        footer {
          text-align: center;
          padding: 10px 0px 10px 0px;
        }

        /*a:focus, a:hover {
          color: #23527c;
          text-decoration: underline;
          background-color: #DADADA;
          display: block;
        }

        img.clickbtn:active {
          opacity: 0.5;
        }*/
    </style>
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
                    <a href="#"><img id="btn-tracking" src="./images/btn_myTrackOrder_normal.png" class="clickbtn"></a>
                </div>
            </div>

            <div class="row-fluid">
                <div class="col-lg-12 btn-padding">
                    <a href="#"><img id="btn-customer" src="./images/btn_customerSupport_normal.png" class="clickbtn"></a>
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


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



<script>
$("#btn-tracking")
  .mouseup(function() {
    $(this).attr({
            src: "./images/btn_myTrackOrder_normal.png"
        });  
  })
  .mousedown(function() {
    $(this).attr({
            src: "./images/btn_myTrackOrder_pressed.png"
        }); 
  });

$("#btn-customer")
  .mouseup(function() {
    $(this).attr({
            src: "./images/btn_customerSupport_normal.png"
        });  
  })
  .mousedown(function() {
    $(this).attr({
            src: "./images/btn_customerSupport_pressed.png"
        }); 
  });

</script>



</body>

</html>