<?php $this->load->view('front/header-pg');?>


      <div class="main">
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
                <h2 class="module-title font-alt">Review</h2>
					<div class="module-subtitle font-serif">Your feedback is a VITAL TOOL used to ensure that we are providing the BEST SERVICE possible!</div>
					<?php } ?>
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
									<?php if( $this->session->flashdata('success') ){ ?>
										<div class="alert alert-success" role="alert"><h4><?php echo $this->session->flashdata('success'); ?></h4></div>
										
									<?php }else{  ?>
								  <h4>Answering a few short questions, enables us to better serve you.</h4>
								  <h5>CLICK INSIDE THE CIRCLE TO THE RIGHT THAT BEST ANSWERS EACH QUESTION</h5>
									<form action="review_add" method="post">
										<div class="img_container_center first_rating_wrap"> 
											<h5>Need Improve - &nbsp; &nbsp; </h5><input type="range" name="first_rating" min="0" max="10" step="1" value="0" class="rev_input" id="first_rating">
											<div class="rateit" data-rateit-mode="font"  style="font-size:30px;top: 8px;" data-rateit-backingfld="#first_rating"></div><h5> &nbsp; &nbsp;  + Very Positive </h5>
									  </div>
										<div class="questions"> 
											<p><span class="rado_2" ><strong> Please rate your exceleratings experience:</strong></span> <span class="rado_1" ></span> </p>
											<ul class="list-group">
											<?php 
												foreach($ques as $q_k => $q_v){ // pre($q_v); ?>
													
													<li class="list-group-item">
														<span class="rado_2" ><b><?php echo $q_k *1 +1; ?>.</b> <?php echo $q_v->question; ?></span> 
														<span class="rado_1" >
															<?php if( $q_v->answer_option == 'rev_1_10' ){ ?>
																<input type="range" name="rev_ques[<?php echo $q_v->qid; ?>]" min="0" max="10" step="1" value="0" class="rev_input" id="qrev<?php echo $q_k; ?>">
																<div class="rateit" data-rateit-backingfld="#qrev<?php echo $q_k; ?>"></div>
															<?php }elseif($q_v->answer_option == 'yes_no'){ ?>
																<div class="btn-group">
																	<label class="btn btn-primary btn-sm">
																		<input type="radio" name="rev_ques[<?php echo $q_v->qid; ?>]" class="rev_input" value="7" > Yes
																	</label>
																	<label class="btn btn-primary btn-sm">
																		<input type="radio" name="rev_ques[<?php echo $q_v->qid; ?>]" class="rev_input" value="3"> No
																	</label>
																</div>
															<?php } ?>
														</span>
													</li>
											<?php	} ?>
											</ul>
											<input type="text" class="total_rev_plus" name="total_rev_plus" hidden >
											<?php $randNumber = rand(1, 20); ?>
											<p><span class="rado_2" ><b>Do you have additional comments or concerns?</b></span></p>
											<textarea class="form-control" name="rev_comment"></textarea>
											<br>
											<p><b>If anything about your experience here failed to meet your expectations, what could we do to improve it for you?</b></p>
											<textarea class="form-control" name="rev_about_experience"></textarea>
											
											<br>
											<div class="row padd-b10">
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_firstname" placeholder="First Name"  /></div>
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_lastname" placeholder="Last Name"  /></div>
												<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="email" name="c_email" placeholder="email" /></div>
											</div>
											<div class="row">
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_phone" placeholder="Phone #" /></div>
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_street" placeholder="Street Address"  /></div>
												<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" name="c_address" placeholder="City, State, Zip" /></div>
											</div>
											<h4 class="thank_title" >
												<strong>Thank you!</strong> Please click "SUBMIT" below to confirm your answers!
											</h4>
											<button type="submit" class="btn btn-block btn-lg btn-round btn-d" >Submit</button>
											
										</div>
									</form>
									<?php } ?>
								</div>
						
							</div>
						</div>
					</div>
				</div>
        </section>
        <hr class="divider-d">
<?php $this->load->view('front/footer-pg');?>