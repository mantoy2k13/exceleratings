<?php $this->load->view('front/header-pg');?>

<?php $this->load->view('front/firebase-update');?>

      <div class="main">
        <section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo base_url('assets/front/'); ?>assets/img/contact.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
							<?php // pre($profile); ?>
							<center>
							<h4>Thank you for taking a moment to rate our business.</h4>
							<h3>You can also leave a review or a testimonial for us using the links below.</h3>
							<?php 
								if( $profile->pos_rdr_url_yelp ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_yelp)?>"><img src="https://s3-media3.fl.yelpcdn.com/assets/srv0/yelp_design_web/b085a608c15f/assets/img/logos_homepage/default.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_google ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_google)?>"><img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_facebook ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_facebook)?>"><img src="<?=base_url('/')?>assets/front/assets/img/new-facebook-logo-2015-200x200.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_trip_advisor ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_trip_advisor)?>"><img src="<?=base_url('/')?>assets/front/assets/img/TA_brand_logo.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_urban_spoon ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_urban_spoon)?>"><img src="<?=base_url('/')?>assets/front/assets/img/Urbanspoon-Logo-Web.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_city_search ){ ?>
									
									<a href="<?=addhttp($profile->pos_rdr_url_city_search)?>"><img src="<?=base_url('/')?>assets/front/assets/img/citysearch.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							</center>
              </div>
            </div>
          </div>
        </section> 
        <section class="module review"> 
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="in_center">
								<div class="in_center_content">
										<div class="alert alert-success" role="alert"><h4>Thank you</h4></div>
								</div>
							</div>
						</div>
					</div>
				</div>
        </section>
<?php $this->load->view('front/footer-pg');?>