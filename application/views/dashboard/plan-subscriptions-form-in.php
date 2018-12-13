
<script src="https://js.braintreegateway.com/web/dropin/1.11.0/js/dropin.min.js"></script>
<?php

//	To Payment ####################################
// Initiate the Braintree
$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '5288gkfmzrh7bzyp',
    'publicKey' => '37r7jyjnqn7hv4tg',
    'privateKey' => 'c41d6f73d3797f59b8e138ad0fe2a8df'
]);

// get the client token
$clientToken = $gateway->clientToken()->generate();

?>

      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
			<!-- Default box -->
			<div class="card">
				<div class="card-header with-border wow bounceInLeft">
					<h3 class="card-title card-box">Enrollment</h3>
				</div>

				<form action="" method="post" enctype="multipart/form-data">

					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
					<div class="card-body" id="cat_add_form">
						<?php 
							$selected_plan = '';
							if( isset($_GET['plan']) ){ 
								$selected_plan = $_GET['plan'];
							} 
							
							if( $selected_plan == 'silver' ){
								$setup_fee = 999;
								$service_fee_month2month = 129;
								$service_fee_yearcotract = 0;
								$additional_services = 250;
							}elseif( $selected_plan == 'gold' ){
								$setup_fee = 1799;
								$service_fee_month2month = 129;
								$service_fee_yearcotract = 0;
								$additional_services = 250;
							}else{
								$setup_fee = 0;
								$service_fee_month2month = 0;
								$service_fee_yearcotract =0 ;
								$additional_services = 0;
							}
						?>
						<form action="" id="enrollment_form" method="POST" >
						  <div class="row wow bounceInRight">
								<div class="btn" data-toggle="buttons">
									<div class="btn-group">
										<label class="btn btn-info <?=$selected_plan == 'basic' ? 'active' : ''?>" title="Anser get by Yes/No options">
											<input type="radio" value="free" name="subs_package_slug" id="subs_package_slug1" <?php if( $selected_plan == 'basic' ){ echo 'checked'; } ?>> 
											Basic Plan
										</label>
									
										<label class="btn btn-info <?=$selected_plan == 'silver' ? 'active' : ''?>" title="Answer get by 1 to 10 reviewing options">
											<input type="radio" value="silver" name="subs_package_slug" id="subs_package_slug2" <?php if( $selected_plan == 'silver' ){ echo 'checked'; } ?>>
											Basic Plus Plan (Silver)
										</label>
									
										<label class="btn btn-info <?=$selected_plan == 'gold' ? 'active' : ''?>" title="Answer get by 1 to 10 reviewing options">
											<input type="radio" value="gold" name="subs_package_slug" id="subs_package_slug3" <?php if( $selected_plan == 'gold' ){ echo 'checked'; } ?>>
											Premium Plan (Golden)
										</label>
									</div>
								</div>
							</div>
							<div class="form-row wow bounceInLeft">
								 <div class="form-group col-md-6">
									<label for="fullname">Client</label>
									<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $profile->fullname; ?>" placeholder="Client">
								 </div>
								 <div class="form-group col-md-6">
									<label for="fullname_contact">Contact Name</label>
									<input type="text" class="form-control" id="fullname_contact" name="fullname_contact" value="<?php echo $profile->fullname_contact; ?>" placeholder="Contact Name">
								 </div>
							</div>
							<div class="form-row wow bounceInRight">
								 <div class="form-group col-md-6">
									<label for="phone">Phone#</label>
									<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $profile->phone; ?>" placeholder="Phone#">
								 </div>
								 <div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $profile->email; ?>" placeholder="Email">
								 </div>
							</div>
							<hr>
							<div class="form-group wow bounceInLeft">
								 <label for="alt_name_client_contact">Alternate client contact:</label>
								 <input type="text" class="form-control" id="alt_name_client_contact" name="alt_name_client_contact" value="<?php echo $profile->alt_name_client_contact; ?>" placeholder="Alternate client contact:">
							</div>
							<div class="form-row wow bounceInRight">
								 <div class="form-group col-md-6">
									<label for="alt_phone">Phone#</label>
									<input type="text" class="form-control" id="alt_phone" name="alt_phone" value="<?php echo $profile->alt_phone; ?>" placeholder="Phone#">
								 </div>
								 <div class="form-group col-md-6">
									<label for="alt_email">Email</label>
									<input type="email" class="form-control" id="alt_email" name="alt_email" value="<?php echo $profile->alt_email; ?>" placeholder="Email">
								 </div>
							</div>
							<div class="form-group wow bounceInLeft">
								<label for="inputAddress">Tablet needed:</label>
								<div class="row" >
									<div class="col-md-3">
										<div class="row" >
											<div class="btn" data-toggle="buttons">
												<div class="btn-group">
													<label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
														<input type="radio" value="1" name="tablet_needed" id="tablet_needed1" <?=$profile->tablet_needed == '1' ? 'checked' : ''?>> 
														Yes
													</label>
												
													<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
														<input type="radio" value="0" name="tablet_needed" id="tablet_needed2" <?=$profile->tablet_needed == '0' ? 'checked' : ''?>>
														No
													</label>
												</div>
											</div>
										</div>
									</div>
									 <div class="form-group col-md-9">
										<div class="form-inline">
										  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">(If so how many?)</label>
										  <input type="text" class="form-control" id="tablet_so_how_many" name="tablet_so_how_many" value="<?php echo $profile->tablet_so_how_many; ?>" size="45">
										</div>
									 </div>
								 </div>
								
							</div>
							<div class="form-group wow bounceInRight">
								 <label for="service_location">Number of service locations:</label>
								 <input type="text" class="form-control" id="service_location" name="service_location" value="<?php echo $profile->service_location; ?>" placeholder="Number of service locations">
							</div>
							<div class="form-group wow bounceInLeft">
								 <label for="start_date_of_contract">Start date of contract:</label>
								 <input type="text" class="form-control" id="start_date_of_contract"name="start_date_of_contract" value="<?php echo $profile->start_date_of_contract; ?>" placeholder="Start date of contract">
							</div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_yelp">Yelp:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_yelp"name="pos_rdr_url_yelp" value="<?php echo $profile->pos_rdr_url_yelp; ?>" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_facebook">Facebook:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_facebook"name="pos_rdr_url_facebook" value="<?php echo $profile->pos_rdr_url_facebook; ?>" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_urban_spoon">Urban Spoon:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_urban_spoon"name="pos_rdr_url_urban_spoon" value="<?php echo $profile->pos_rdr_url_urban_spoon; ?>" placeholder="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_google">Google+:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_google"name="pos_rdr_url_google" value="<?php echo $profile->pos_rdr_url_google; ?>" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_trip_advisor">Trip Advisor:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_trip_advisor" name="pos_rdr_url_trip_advisor" value="<?php echo $profile->pos_rdr_url_trip_advisor; ?>" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="row form-group">
											<label for="pos_rdr_url_city_search">City Search:</label>
											<input type="text" class="form-control form-control-sm" id="pos_rdr_url_city_search" name="pos_rdr_url_city_search" value="<?php echo $profile->pos_rdr_url_city_search; ?>" placeholder="">
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group row">
							 <label for="inputEmail3" class="col-sm-6 col-form-label">Set up fee: </label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" value="<?=$setup_fee?>" placeholder="#" readonly >
								</div>
							 </div>
							 
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Service fee (month-to-month) :</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" value="<?=$service_fee_month2month?>" placeholder="#" readonly >
								</div>
							 </div>
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Service fee (year contract):</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" value="<?=$service_fee_yearcotract?>" placeholder="#" readonly >
								</div>
							 </div>
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Additional services (Tablets, etc):</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" value="<?=$additional_services?>" placeholder="#" readonly >
								</div>
							 </div>
							
							 <div class="col-sm-6 col-form-label font-weight-bold"><br>TOTAL:</div>
							 <div class="col-sm-6">
								<div class="input-group">
									<label for="total_amount"></label>
									<div class="input-group-prepend">
										<div class="input-group-text font-weight-bold ">$</div>
									</div>
									<input type="text" class="form-control form-control-lg font-weight-bold text-right" id="total_amount" name="total_amount" placeholder="#" value="<?=$setup_fee + $service_fee_month2month + $service_fee_yearcotract + $additional_services?>" readonly>
								</div>
							 </div>
						  </div>
								
							<h4>Payment Method:</h4>
							<label for="inputAddress">Payment to: Excel Marketing Group, LLC </label>
							<div class="bt-drop-in-wrapper">
								<div id="bt-dropin"></div>
							</div>
							
							 <input id="nonce" name="payment_method_nonce" type="hidden" />
							
							<hr>
							<p>Your signature authorizes Excel Marketing, LLC to charge your card for the Set Up Fees, Monthly Service Fees agreed to under the terms of this contract.</p>
							<hr>
							<p class="font-italic"><small>Exceleratings promises to provide a convenient opportunity for your customers to post their reviews on-line. Exceleratings can not guarantee the postings of the reviews on any third party portal, as each entity has it’s own !ltering protocals in place. Exceleratings will make every e"ort to ensure that customer reviews are directed to the preferred “review site” of the clients choice</small></p>
							<p class="font-italic"><small>Excleratings guarantees that all questionnaires and metrics will be provided according to the plan that is being executed by this contract</small></p>
							<p class="font-weight-bold text-danger bg-dark p-3 mb-2">Without your permission, your client information is NEVER shared – PERIOD!</p>
							<hr>
							  <button type="submit" class="btn btn-info btn-lg float-right"> &nbsp; &nbsp; &nbsp; Submit &nbsp; &nbsp; &nbsp; </button>
						</form>
					</div>
				  <!-- /.box-body -->		
				</form>  
			 </div>
        </div>
        <div class="col-md-4">

				<div class="card wow flipInX">
					<div class="card-body">
					
						  <div class="card-header text-center">
								1
						  </div>
						  <div class="card-body text-center">
							 <h4 class="card-title">Silver Plan</h4>
						  </div>
						  <div class="card-footer text-center">
							 Set Up Fee : <b>$999.00</b>
						  </div>
						  <div class="card-footer text-center">
							 Tablet : <b>$250.00</b>
						  </div>
						  <div class="card-footer text-center">
							 Service Fee : <b>$129.00</b> <small>/ month*</small>
						  </div>
						  <div class="card-footer text-center">
							 <small>*with 1 year contract</small>
						  </div>
						  <div class="clearfix"></div>
						  <hr>
						 
								√ Multiple Page Questionnaire<br>
								√ Custom Graphics<br>
								√ Links to Yelp, Google+, Facebook, Trip Advisor, etc.<br>
								√ Email Alerts if there is negative feedback<br>
								√ Functionality Updates<br>
								√ Spreadsheet Reporting
								<br><br>
								<hr>
								<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=silver')?>" type="submit" name="subs_submit2buy" class="btn btn-info btn-lg btn-block">Subscribe</a>
						 
					</div>
				</div>
				

				<div class="card wow flipInX">
					<div class="card-body">
					
						  <div class="card-header text-center">
								2
						  </div>
						  <div class="card-body text-center">
							 <h4 class="card-title">Gold Plan</h4>
						  </div>
						  <div class="card-footer text-center">
							 Set Up Fee: <b>$1799.00</b>
						  </div>
						  <div class="card-footer text-center">
							 Tablet <b>$250.00</b>
						  </div>
						  <div class="card-footer text-center">
							 Service Fee: <b>$249.00</b> <small>/ month*</small>
						  </div>
						  <div class="card-footer text-center">
							 <small>*with 1 year contract</small>
						  </div>
						  <div class="clearfix"></div>
						  <hr>
								√ Custom Questionnaire<br>
								√ Links to Yelp, Google+, Facebook, Trip Advisor, etc.<br>
								√ Email Alerts if there is negative feedback<br>
								√ Question Updates<br>
								√ Custom Reports<br>
								√ Granular Reporting Metrics<br>
								√ Quarterly Design Edits
								<hr>
								<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=gold')?>" type="submit" name="subs_submit2buy" class="btn btn-info btn-lg btn-block">Subscribe</a>
					</div>
				</div>
        </div>

      </div>
      <!-- /.box -->

<script>

    (function () {
        var amount = document.querySelector('#total_amount');
        var amountLabel = document.querySelector('label[for="total_amount"]');

        amount.addEventListener('focus', function () {
            amountLabel.className = 'has-focus';
        }, false);
        amount.addEventListener('blur', function () {
            amountLabel.className = '';
        }, false);
    })();

    var form = document.querySelector('#enrollment_form');
    var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
    braintree.dropin.create({
        authorization: client_token,
        selector: '#bt-dropin',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
			 
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                
                     setTimeout(function(){
                        form.submit();
                     }, 1000);
            });
        });
    });
</script>  
