<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

	<?php 
	//	pre($this->logedin_user->subs_package_slug);
		if( $this->logedin_user->subs_package_slug == 'bronze' || $this->logedin_user->subs_package_slug == 'silver' || $this->logedin_user->subs_package_slug == 'gold' || $this->logedin_user->usertype == 'superadmin' ){ ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
			<!-- Default box -->
			<div class="card">
				<div class="card-header with-border wow bounceInLeft">
					<h3 class="card-title card-box">Add new review question</h3>
				</div>

					<form action="" method="post" enctype="multipart/form-data">

						<?php if( $this->session->flashdata('success') ){ ?>
							<div class="container-fluid">
								<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
							</div>
						<?php } ?>
						<?php if( $this->session->flashdata('error') ){ ?>
							<div class="container-fluid">
								<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
							</div>
						<?php } ?>
						
						<div class="card-body wow bounceInRight" id="cat_add_form">
							
						  <div class="form-group">
							 <label for="post_title">Add new review question</label>
							<textarea name="question" id="question" class="form-control" rows=""></textarea>
						  </div>
						  <?php if( $this->logedin_user->usertype == 'superadmin' ){ ?>
						  <div class="form-group">
							 <label for="post_title">Business Category</label>
							 <select name="service_category" class="form-control">
								<option value=""> -- Select -- </option>
							<?php
								foreach( $service_categories as $sc_k => $sc_v ){ ?> 
								<option value="<?=$sc_v->id?>"><?=$sc_v->title?></option> 
							<?php } ?> 
							 </select>
						  </div>
						  <?php } ?> 
						  <div class="row">
							  <div class="col-md-6">
							  
										<div class="custom-control custom-radio">
										  <input type="radio" id="customRadio1" value="yes_no" name="answer_option" class="custom-control-input">
										  <label class="custom-control-label" for="customRadio1">Get Answers by Yes/No options</label>
										</div>
										<div id="yes_no_point" style="display: none;">
											<div class="btn-group btn-group-toggle" data-toggle="buttons">
											  <label class="btn btn-info btn-sm active">
												 <input type="radio" name="yes_no_count" value="0" id="option1" autocomplete="off" checked> Rating for 'YES'
											  </label>
											  <label class="btn btn-info btn-sm">
												 <input type="radio" name="yes_no_count" value="1" id="option2" autocomplete="off"> Rating for 'NO'
											  </label>
											</div>
											<hr>
										</div>
										
										<div class="custom-control custom-radio">
										  <input type="radio" id="customRadio2" value="rev_1_10" name="answer_option" class="custom-control-input" checked >
										  <label class="custom-control-label" for="customRadio2">Get Answers in 1-10 review points</label>
										</div>
										
							  </div>
							  <div class="col-md-6">
									<br>
									<div class="form-group">
										<button type="submit" name="rev_question_add" class="btn btn-lg btn-info btn-block"> Save </button>
									</div>
									
							  </div>
						  </div>
						</div>
					  <!-- /.box-body -->		
					</form>  
				
			 </div>
        </div>

      </div>
		<?php }else{ ?>
      <div class="row">
        <div class="col-md-12">
					<div class="alert alert-danger">
						<strong>Note!</strong> Not allow to add question until you have no any subscription plan!
					</div>
				</div>
			</div>
		<?php // $this->load->view('dashboard/plan-subscriptions-in'); ?>
       <a href="<?php echo base_url('front/pricing'); ?>" class="btn btn-info">Subscription plan page link</a>
		<?php } ?>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>