<?php $this->load->view('front/header-pg');?>


      <div class="main">
        <section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo base_url('assets/front/'); ?>assets/img/contact.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Review</h2>
				<div class="module-subtitle font-serif">Your feedback is a VITAL TOOL used to ensure that we are providing the BEST SERVICE possible!</div>
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
								  <h4>Answering a few short questions, enables us to better serve you.</h4>
								  <h5>CLICK INSIDE THE CIRCLE TO THE RIGHT THAT BEST ANSWERS EACH QUESTION</h5>
									<form action="review_add" method="post">
										<div class="img_container_center first_rating_wrap"> 
											<h5>Need Improve - &nbsp; &nbsp; </h5><input type="range" name="first_rating" min="0" max="10" step="1" value="0" id="first_rating">
											<div class="rateit" data-rateit-mode="font"  style="font-size:30px;top: 8px;" data-rateit-backingfld="#first_rating"></div><h5> &nbsp; &nbsp;  + Very Positive </h5>
									  </div>
										<div class="questions"> 
											<p><span class="rado_2" ><strong> Please rate your exceleratings experience:</strong></span> <span class="rado_1" ></span> </p>
											<ul class="list-group">
											<?php 
												foreach($ques as $q_k => $q_v){ // pre($q_v); ?>
													
													<li class="list-group-item">
														<span class="rado_2" ><?php echo $q_k *1 +1; ?>. <?php echo $q_v->question; ?></span> 
														<span class="rado_1" >
															<?php if( $q_v->answer_option == 'rev_1_10' ){ ?>
																<input type="range" name="rev_ques['<?php echo $q_k; ?>']" min="0" max="10" step="1" value="0" id="qrev<?php echo $q_k; ?>">
																<div class="rateit" data-rateit-backingfld="#qrev<?php echo $q_k; ?>"></div>
															<?php }elseif($q_v->answer_option == 'yes_no'){ ?>
																<div class="btn-group" data-toggle="buttons">
																	<label class="btn btn-primary btn-sm">
																		<input type="radio" name="rev_ques['<?php echo $q_k; ?>']" value="yes"> Yes
																	</label>
																	<label class="btn btn-primary btn-sm">
																		<input type="radio" name="rev_ques['<?php echo $q_k; ?>']" value="yes"> No
																	</label>
																</div>
															<?php } ?>
														</span>
													</li>
											<?php	} ?>
											</ul>
											
											<p><span class="rado_2" ><b>Do you have additional comments or concerns?</b></span></p>
											<p><input class="add_coment" type="text" /></p>
											<h5 class="last_title" >We apologize that your experience did not meet your expectations.</h5>
											<h5>We Would like to learn how we can improve our service.</h5>
											
											<p class="deff_ask" ><span class="rado_2" > Do you know about our "Intelidata" extended analytics services?</span> <span class="rado_1" >
											Yes <input type="radio" value="1"  name="is_intelidata" />No <input type="radio" value="0"  name="is_intelidata" /></span> </p>
											<br>
											<div class="row padd-b10">
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_firstname" placeholder="First Name" /></div>
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_lastname" placeholder="Last Name"  /></div>
												<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" name="c_email" placeholder="email"  /></div>
											</div>
											<div class="row">
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_phone" placeholder="Phone#" /></div>
												<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" name="c_street" placeholder="Street Address" /></div>
												<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" name="c_address" placeholder="City, State, Zip" /></div>
											</div>
											<h4 class="thank_title" >
												<strong>Thank you!</strong> Please click "SUBMIT" below to confirm your answers!
											</h4>
											<button type="submit" class="btn btn-block btn-lg btn-round btn-d" >Submit</button>
											
										</div>
									</form>
								</div>
						
							</div>
						</div>
					</div>
				</div>
        </section>
        <hr class="divider-d">
<?php $this->load->view('front/footer-pg');?>