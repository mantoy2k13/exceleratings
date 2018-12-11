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
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
	
  <!-- Modal -->
    <!--
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="login-content">
			  
			  <div class="container-fluid">
				  <div class="in_center">
						<div class="in_center_content">
						  <h4>Answering a few short questions, enables us to better serve you.</h4>
						  <h5>CLICK INSIDE THE CIRCLE TO THE RIGHT THAT BEST ANSWERS EACH QUESTION</h5>
						  <div class="img_container_center"> 
							<img src="<?php // echo base_url('assets/front/'); ?>assets/img/review.png" alt="review" />
						  </div>
						  <div class="questions"> 
							<p><span class="rado_2" ><strong> Please rate your exceleratings experience:</strong></span> <span class="rado_1" ><span >10</span><span >9</span><span >8</span><span >7</span><span >6</span><span >5</span><span >4</span><span>3</span><span>2</span><span >1</span></span> </p>
							
							<p><span class="rado_2" >1.	How was yourvisit  to ____________overall ?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >2.	How was our customer service?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >3.	How was your individual experience while you were here?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >4.	Would refer your friends or family to our “Practice” (or business)</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >5.	What was the quality of our Dr’s service?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >6.	What was the quality of your medical treatment you received?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >7.	How would you rate the cleanliness of our facility?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							
							<p><span class="rado_2" >8.	How likely is it that you will come back for a visit to our Practice? (or business?)</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
						
						  </div>
							<p class="round_back" >I wish that you had a leave behind brochure that I could pass to my business colleagues. You should send out a marketing kit to all your clients. </p>
							<p><span class="rado_2" >9. Would you refer exceleratings to your colleagues?</span> <span class="rado_1" >
							<input type="radio" value="1"  name="q1" /><input type="radio" value="2"  name="q1" /><input type="radio" value="3"  name="q1" /><input type="radio" value="4"  name="q1" /><input type="radio" value="5"  name="q1" /><input type="radio" value="6"  name="q1" /><input type="radio" value="7"  name="q1" /><input type="radio" value="8"  name="q1" /><input type="radio" value="9"  name="q1" /><input type="radio" value="10"  name="q1" /></span> </p>
							<p><span class="rado_2" >10. Do you know about our "Intelidata" extended analytics services?</span> <span class="rado_1" >
							Yes <input type="radio" value="2"  name="q1" />No <input type="radio" value="3"  name="q1" /></span> </p>
							<p><span class="rado_2" >11. Do you have additional comments or concerns?</span></p>
							<p><input class="add_coment" type="text" /></p>
							<h5 class="last_title" >We apologize that your experience did not meet your expectations.</h5>
							<h5>We Would like to learn how we can improve our service.</h5>
							
							<p class="deff_ask" ><span class="rado_2" > Do you know about our "Intelidata" extended analytics services?</span> <span class="rado_1" >
							Yes <input type="radio" value="2"  name="q1" />No <input type="radio" value="3"  name="q1" /></span> </p>
							<div class="row padd-b10">
								<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="First Name" /></div>
								<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Last Name"  /></div>
								<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" placeholder="email"  /></div>
							</div>
							<div class="row">
								<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Phone#" /></div>
								<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Street Address" /></div>
								<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" placeholder="City, State, Zip" /></div>
							</div>
							<h4 class="thank_title" ><strong>Thank you!</strong> Please click "SUBMIT" below to confirm your answers!</h4>
							<p class="review_submittion" >Submit</p>
						  
						</div>
				  </div>
			  </div>
			
			
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	
       -->
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
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
					<li class="dropdown"><a href="<?php echo base_url('/'); ?>dashboard">Admin</a></li>
					<?php }else{ ?>
					<li class="dropdown"><a href="<?php echo base_url('auth/login'); ?>">Login</a></li>
					<li class="dropdown"><a href="<?php echo base_url('auth/registration'); ?>">Registration</a></li>
					<?php } ?>
            </ul>
          </div>
        </div>
      </nav>