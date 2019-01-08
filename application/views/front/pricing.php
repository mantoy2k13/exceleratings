<?php $this->load->view('front/header-pg');?>

	  <section class="module">
		 <div class="container">
			<div class="row">
			  <div class="col-sm-6 col-sm-offset-3">
				 <h2 class="module-title font-alt">Our Prices</h2>
				 <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
			  </div>
			</div>
			<div class="row multi-columns-row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="price-table font-alt">
                        <h4>Bronze Plan</h4>
                        <div class="borderline"></div>
                        Set Up Fee : <b>$250.00</b><br>
                        Service Fee : <b>$150.00</b> <small>/ month*</small>
                        <hr>
                        <small>*with 1 year contract</small>
                        <p class="price"><span>$</span>250<span>.00</span></p>
                        <ul class="price-details">
                        <li>√ Attach to Invoice (Contractors)  or Check (restaurants) or Check Out at Dr’’s  Office Or Hotels</li>
                        <li>√ Text goes out immediately to their phone</li>
                        <li>√ Option to Leave Review on Google or FB  only (Podium Model as Reference)</li>
                        <li>√ Price : $250 Set Up fee  $150/Month per location</li>
                        </ul>
                        <?php 
                            if( $this->session->userdata('logedin_user') ){ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('dashboard/page/plan_subscription_form?plan=bronze'); ?>">Subscribe</a>
                        <?php }else{ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('auth/login?rdr=plan_subscription&plan=bronze'); ?>">Login to Subscribe</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="price-table font-alt">
                        <h4>Silver Plan</h4>
                        <div class="borderline"></div>
                        Set Up Fee (incudes Tablet) : <b>$350.00</b><br>
                        Service Fee : <b>$250.00</b> <small>/ month*</small>
                        <hr>
                        <small>*with 1 year contract</small>
                        <p class="price"><span>$</span>350<span>.00</span></p>
                        <ul class="price-details">
                        <li>√ Tablet with 5 Basic Question –Questionnaire on it presented in Office or Business or  Home</li>
                        <li>√ Positive Review opens link to leave review</li>
                        <li>√ Negative Review pings Manager</li>
                        <li>√ Text Reminder with Positive</li>
                        <li>√ Email Reminder with Positive</li>
                        <li>√ Incentive Gift Cards</li>
                        <li>√ Price $350 Set Up (incudes Tablet) $250.00/month per Location</li>
                        </ul>
                        <?php 
                            if( $this->session->userdata('logedin_user') ){ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('dashboard/page/plan_subscription_form?plan=silver'); ?>">Subscribe</a>
                        <?php }else{ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('auth/login?rdr=plan_subscription&plan=silver'); ?>">Login to Subscribe</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="price-table font-alt">
                        <h4>Gold Plan</h4>
                        <p class="small">Best Choice</p>
                        <div class="borderline"></div>
                        Set Up Fee (incudes Tablet) : <b>$550.00</b><br>
                        Service Fee : <b>$250.00</b> <small>/ month*</small>
                        <hr>
                        <small>*with 1 year contract</small>
                        <p class="price"><span>$</span>550<span>.00</span></p>
                        <ul class="price-details">
                            <li>√ Tablet with 10 Custom Questions Question –Questionnaire on it presented in Office or Business or  Home</li>
                            <li>√ Positive Review opens link to leave review</li>
                            <li>√ Negative Review pings Manager</li>
                            <li>√ Text Reminder with Positive</li>
                            <li>√ Email Reminder with Positive</li>
                            <li>√ Survey Metrics for inner office management</li>
                            <li>√ Social Media/Review sites Automated Updates</li>
                            <li>√ Incentive Gift Cards</li>
                            <li>√ Price $550 Set Up (incudes Tablet) $250.00/month per Location</li>
                        </ul>
                        <?php 
                            if( $this->session->userdata('logedin_user') ){ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('dashboard/page/plan_subscription_form?plan=gold'); ?>">Subscribe</a>
                        <?php }else{ ?>
                                <a class="btn btn-d btn-round" href="<?php echo base_url('auth/login?rdr=plan_subscription&plan=gold'); ?>">Login to Subscribe</a>
                        <?php } ?>
                    </div>
                </div>
			</div>
			<div class="row mt-40">
                <div class="col-sm-6 col-sm-offset-3 align-center">
                    <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                </div>
			</div>
		 </div>
	  </section>
<?php $this->load->view('front/footer-pg');?>