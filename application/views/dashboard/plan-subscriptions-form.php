<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

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
						
						<form>
						  <div class="row wow bounceInRight">
								<div class="btn" data-toggle="buttons">
									<div class="btn-group">
										<label class="btn btn-info" title="Anser get by Yes/No options">
											<input type="radio" value="yes_no" name="answer_option" id="option1" > 
											Basic Plan
										</label>
									
										<label class="btn btn-info" title="Answer get by 1 to 10 reviewing options">
											<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
											Basic Plus Plan (Silver)
										</label>
									
										<label class="btn btn-info" title="Answer get by 1 to 10 reviewing options">
											<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
											Premium Plan (Golden)
										</label>
									</div>
								</div>
							</div>
							<div class="form-row wow bounceInLeft">
								 <div class="form-group col-md-6">
									<label for="inputEmail4">Client</label>
									<input type="text" class="form-control" id="inputEmail4" placeholder="Client">
								 </div>
								 <div class="form-group col-md-6">
									<label for="inputPassword4">Contact Name</label>
									<input type="text" class="form-control" id="inputPassword4" placeholder="Contact Name">
								 </div>
							</div>
							<div class="form-row wow bounceInRight">
								 <div class="form-group col-md-6">
									<label for="inputPassword4">Phone#</label>
									<input type="text" class="form-control" id="inputPassword4" placeholder="Phone#">
								 </div>
								 <div class="form-group col-md-6">
									<label for="inputEmail4">Email</label>
									<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
								 </div>
							</div>
							<hr>
							<div class="form-group wow bounceInLeft">
								 <label for="inputAddress">Alternate client contact:</label>
								 <input type="text" class="form-control" id="inputAddress" placeholder="Alternate client contact:">
							</div>
							<div class="form-row wow bounceInRight">
								 <div class="form-group col-md-6">
									<label for="inputPassword4">Phone#</label>
									<input type="text" class="form-control" id="inputPassword4" placeholder="Phone#">
								 </div>
								 <div class="form-group col-md-6">
									<label for="inputEmail4">Email</label>
									<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
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
														<input type="radio" value="yes_no" name="answer_option" id="option1" > 
														Yes
													</label>
												
													<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
														<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
														No
													</label>
												</div>
											</div>
										</div>
									</div>
									 <div class="form-group col-md-9">
										<div class="form-inline">
										  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">(If so how many?)</label>
										  <input type="text" class="form-control" id="inputPassword4" size="44">
										</div>
									 </div>
								 </div>
								
							</div>
							<div class="form-group wow bounceInRight">
								 <label for="inputAddress">Number of service locations:</label>
								 <input type="text" class="form-control" id="inputAddress" placeholder="Number of service locations">
							</div>
							<div class="form-group wow bounceInLeft">
								 <label for="inputAddress">Start date of contract:</label>
								 <input type="text" class="form-control" id="inputAddress" placeholder="Start date of contract">
							</div>
							<div class="form-group wow bounceInRight">
								<label for="inputAddress">Choose your preferred review site:</label>

								<div class="row" >
									<div class="btn" data-toggle="buttons">
										<div class="btn-group">
											<label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
												<input type="radio" value="yes_no" name="answer_option" id="option1" > 
												Yelp
											</label>
										
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Facebook
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Urban Spoon
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Google+
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Trip Advisor
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												City Search
											</label>
										</div>
									</div>
								</div>
							</div>
							

						  <div class="form-group row wow bounceInLeft">
							 <label for="inputEmail3" class="col-sm-6 col-form-label">Set up fee: </label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" placeholder="#">
								</div>
							 </div>
							 
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Service fee (month-to-month) :</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" placeholder="#">
								</div>
							 </div>
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Service fee (year contract):</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" placeholder="#">
								</div>
							 </div>
							 <label for="inputPassword3" class="col-sm-6 col-form-label">Additional services (Tablets, etc):</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">$</div>
									</div>
									<input type="number" class="form-control text-right" id="inputEmail3" placeholder="#">
								</div>
							 </div>
							 
							 <label for="inputPassword3" class="col-sm-6 col-form-label font-weight-bold"><br>TOTAL:</label>
							 <div class="col-sm-6">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text font-weight-bold ">$</div>
									</div>
									<input type="number" class="form-control form-control-lg font-weight-bold text-right" id="inputEmail3" placeholder="#">
								</div>
							 </div>
						  </div>
							
							<h4>Payment Method:</h4>
							<div class="form-group wow bounceInRight">
								<label for="inputAddress">Payment to: Excel Marketing Group, LLC </label>
								<div class="row" >
									<div class="btn" data-toggle="buttons">
										<div class="btn-group">
											<label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
												<input type="radio" value="yes_no" name="answer_option" id="option1" > 
												Visa
												<i class="fa fa-cc-visa" aria-hidden="true"></i>
											</label>
										
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Master Card 
												<i class="fa fa-cc-mastercard" aria-hidden="true"></i>
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Amex
												<i class="fa fa-cc-amex" aria-hidden="true"></i>
											</label>
											<label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												<input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Paypal
												<i class="fa fa-cc-paypal" aria-hidden="true"></i>
											</label>
										</div>
									</div>
								</div>
							</div>
							
							<div class="form-group wow bounceInLeft">
								 <label for="inputAddress">Card #:</label>
								 <input type="text" class="form-control" id="inputAddress" placeholder="Card #:">
							</div>
							<div class="form-row wow bounceInRight">
								 <div class="form-group col-md-6">
									<label for="inputPassword4">Expiration Date</label>
									<input type="text" class="form-control" id="inputPassword4" placeholder="Expiration Date">
								 </div>
								 <div class="form-group col-md-6">
									<label for="inputEmail4">CVV Code (on back)</label>
									<input type="email" class="form-control" id="inputEmail4" placeholder="CVV Code (on back)">
								 </div>
							</div>
							<div class="form-group wow bounceInLeft">
								 <label for="inputAddress">Name on card:</label>
								 <input type="text" class="form-control" id="inputAddress" placeholder="Card #:">
							</div>
							<div class="form-group wow bounceInRight">
								 <label for="inputAddress">Billing Address:</label>
								 <textarea class="form-control" id="inputAddress" placeholder="Billing Address"></textarea>
							</div>
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
								<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=golden')?>" type="submit" name="subs_submit2buy" class="btn btn-info btn-lg btn-block">Subscribe</a>
					</div>
				</div>
        </div>

      </div>
      <!-- /.box -->

		  <div style="clear:both;"></div>
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>