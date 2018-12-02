<?php $this->load->view('front/header-pg');?>


      <div class="main">
        <section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo base_url('assets/front/'); ?>assets/img/contact.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
							<?php // pre($profile); ?>
							<center>
							<h4>Thanks for your rating, Please review us also on this sites.</h4>
							<?php 
								if( $profile->pos_rdr_url_yelp ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_yelp?>"><img src="https://s3-media3.fl.yelpcdn.com/assets/srv0/yelp_design_web/b085a608c15f/assets/img/logos_homepage/default.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_google ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_yelp?>"><img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_facebook ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_facebook?>"><img src="<?=base_url('/')?>assets/front/assets/img/new-facebook-logo-2015-200x200.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_trip_advisor ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_trip_advisor?>"><img src="<?=base_url('/')?>assets/front/assets/img/TA_brand_logo.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_urban_spoon ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_urban_spoon?>"><img src="<?=base_url('/')?>assets/front/assets/img/Urbanspoon-Logo-Web.png" class="img-thumbnail" style="max-width: 150px;"></a>
							<?php } ?>
							
							<?php 
								if( $profile->pos_rdr_url_city_search ){ ?>
									
									<a href="<?=$profile->pos_rdr_url_city_search?>"><img src="<?=base_url('/')?>assets/front/assets/img/citysearch.png" class="img-thumbnail" style="max-width: 150px;"></a>
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
										<div class="alert alert-success" role="alert"><h4>Thanks for your rating, Please review us also on above sites.</h4></div>
								</div>
							</div>
						</div>
					</div>
				</div>
        </section>
        <hr class="divider-d">
<?php $this->load->view('front/footer-pg');?>