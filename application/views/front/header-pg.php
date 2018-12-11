<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Exceleratings</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/front/'); ?>assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/front/'); ?>assets/img/favicon30.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url('assets/front/'); ?>assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/front/'); ?>assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="<?php echo base_url('assets/front/'); ?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/'); ?>admin/assets/css/login.css">
    <link id="color-scheme" href="<?php echo base_url('assets/front/'); ?>assets/css/colors/default.css" rel="stylesheet">
    <link id="color-scheme" href="<?php echo base_url('assets/common/'); ?>rateit/rateit.css" rel="stylesheet">
    <link id="color-scheme" href="<?php echo base_url('assets/front/'); ?>assets/css/custom.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('assets/front/'); ?>assets/img/logo.png" alt="logo" /></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>" >Home</a></li>
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>front/about">About Us</a></li>
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>front/pricing">Pricing</a></li>
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>front/team">Our Team</a></li>
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>front/contact">Contact Us</a></li>
				  <?php 
				  if($this->session->userdata('logedin_user')){ ?>
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>front/review">Review Page</a></li>
					<?php }else{ ?>
					<li class="dropdown"><a href="<?php echo base_url('auth/login'); ?>">Login</a></li>
					<li class="dropdown"><a href="<?php echo base_url('auth/registration'); ?>">Registration</a></li>
					<?php } ?>
              <li class="dropdown"><a href="<?php echo base_url('/'); ?>dashboard">Admin</a></li>
            </ul>
				<div class="navbar-form navbar-right" id="nav_rev_count_show" hidden >
				  <div class="form-group">
						<span>Average Rating</span>
					 <input type="text" class="form-control total_rev_plus" name="total_rev_plus" Readonly size="5">
				  </div>
				</div>
          </div>
        </div>
      </nav>
      <div class="main">