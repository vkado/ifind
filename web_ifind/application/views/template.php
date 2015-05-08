<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type='image/x-icon' href="<?php echo base_url();?>image/favicon.ico">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <?php if (isset($description)) { ?>
        <meta name="description" content="<?php echo $description; ?>" />
    <?php } ?>
    <?php if (isset($keywords)) { ?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css" />

    <script type="text/javascript">
        var baseUrlPath = "<?php echo base_url();?><?php echo (index_page() == '')? '' : index_page()."/" ?>";
    </script>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<!-- Preloader -->
<div id="preloader">
    <div id="load"></div>
</div>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">
                <h1>iFind</h1>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#intro">Home</a></li>
                <li><a href="#order">Order</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Section: intro -->
<section id="intro" class="intro">

    <div class="slogan">
        <h2>WELCOME TO <span class="text_color">iFind</span> </h2>
        <h4>We can find the order of iTruemart</h4>
    </div>
    <div class="page-scroll">
        <a href="#order" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </div>
</section>


<!-- Section: order -->
<section id="order" class="home-section text-center bg-gray">

    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>iFind Order</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <?php
            $this->load->view($main);
            ?>
        </div>
    </div>

</section>

<section id="test" class="home-section text-center bg-gray">

    <div class="slogan">
        <h2>WELCOME TO <span class="text_color">iFind</span> </h2>
        <h4>We can find the order of iTruemart</h4>
    </div>
    <div class="page-scroll">
        <a href="#order" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </div>
</section>

<!-- /Section: services -->


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="wow shake" data-wow-delay="0.4s">
                    <div class="page-scroll marginbot-30">
                        <a href="#intro" id="totop" class="btn btn-circle">
                            <i class="fa fa-angle-double-up animated"></i>
                        </a>
                    </div>
                </div>
                <p>&copy;Copyright 2014 - iFind. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/script.min.js"></script>
</body>
</html>