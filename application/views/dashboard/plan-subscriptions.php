<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
	

		<div class="row">
		
				<div class="col">
					<div class="card text-center">
						<div class="card-body">
						
							  <div class="card-header text-center">
									1
							  </div>
							  <div class="card-body">
								 <h4 class="card-title">Basic Plan</h4>
							  </div>
							  <div class="card-footer text-muted">
									
							  </div>
							  <div class="clearfix"></div>
							  <hr>
							  
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-body">
						
							  <div class="card-header text-center">
									2
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
				</div>
				<div class="col">
					<div class="card ">
						<div class="card-body">
							  <div class="card-header text-center">
									3
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
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>