<?php $this->load->view('front/header-pg');?>


<section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo base_url('assets/front/'); ?>assets/img/contact.jpg">
	<div class="container">
		<div class="row">
		  <div class="col-sm-6 col-sm-offset-3">
			<?php if( $this->session->flashdata('success') ){ ?>
				<h2 class="module-title font-alt"><?php echo $this->session->flashdata('success'); ?></h2>
				<?php if( $this->session->flashdata('review70up') ){ ?>
					<center>
					<a href="#"><img src="https://s3-media3.fl.yelpcdn.com/assets/srv0/yelp_design_web/b085a608c15f/assets/img/logos_homepage/default.png" class="img-thumbnail" style=""></a>
					<a href="#"><img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" class="img-thumbnail"></a>
					</center>
				<?php } ?>
			<?php }else{  ?>
			 <h2 class="module-title font-alt">Contact us</h2>
			<?php } ?>
		  </div>
		</div>
	</div>
</section>        
<br>
<section class=""  style='background-color: #fff;' id="contact">
<BR>
	<div class="container">
        <div class="row">
        	<div class="col-sm-8">
						<?php 
							if( isset($_SESSION['success']) ){
								echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
							} 
							if( isset($_SESSION['error']) ){
								echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
							} 
						?>
						<?php echo validation_errors('<p class="text-red"><b>', '</b></p>'); ?>
            	<form id="contactForm" role="form" method="post" action="">
                	<div class="form-group">
                    	<label class="sr-only" for="name">Name</label>
                    	<input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    	<p class="help-block text-danger"></p>
                  	</div>
                  
                  	<div class="form-group">
                    	<label class="sr-only" for="email">Email</label>
                    	<input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    	<p class="help-block text-danger"></p>
                  	</div>
                  
                  	<div class="form-group">
                  		<label class="sr-only" for="postcode">Comments</label>
                    	<textarea class="form-control" rows="7" id="comments" name="comments" placeholder="Your Comments*" required="required" data-validation-required-message="Please enter your comments."></textarea>
                    	<p class="help-block text-danger"></p>
                  	</div>        
                  
                  	<div class="text-center">
                    	<button class="btn btn-block btn-round btn-d" name="contact_submit" id="contact_submit" type="submit">Submit</button>
                  	</div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
        	</div>
            
            <div class="col-sm-4">
            	<div class="alt-features-item mt-0">
                  <div class="alt-features-icon"><span class="icon-megaphone"></span></div>
                  <h3 class="alt-features-title font-alt">Where are we?</h3>
				  <b>XXXXXX Office</b><BR>
				  Xxxx Xxxx Centre, Swords Road, Dublin 9<BR>
				  Phone: ### ### ###<BR><BR>

                  <b>XXXXXX Office</b><BR>
				  Xxxx House, Unit 7 Xxxx Square, Xxxx<BR>
				  Phone: ### ### ###
				   
                </div>
        	</div>
     	</div>
        <br> <br> <br>
        <div class="row">
        	<div class="col-sm-6">
        		<B>XXXXXX Office</B><BR>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2379.277373437397!2d-6.25041258451511!3d53.39197797998855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e22f77db2eb%3A0x91c37f0d843db81!2sHoran+Estates!5e0!3m2!1sen!2sie!4v1507494399688" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			
			<div class="col-sm-6">
				<B>XXXXXX Office</B><BR>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2385.8323039302672!2d-9.050697284520512!3d53.27462427996409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485b96ef617139fb%3A0x574cda40bff140ed!2sHoran+Estates!5e0!3m2!1sen!2sie!4v1507494448490" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>		
</section>
        <hr class="divider-d">
<?php $this->load->view('front/footer-pg');?>