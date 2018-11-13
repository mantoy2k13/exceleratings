<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

      <div class="row">
			<!-- left column -->
			<div class="col-md-9">
			<!-- Default box -->
			<div class="card">
				<div class="card-header with-border wow bounceInLeft">
					<h3 class="card-title card-box">Single review page</h3>
				</div>

				<div class="card">
					<div class="card-body" >
						<?php if( $this->session->flashdata('success') ){ ?>
							<div class="text-right">
								<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-md-6">
								
								<h4 class="text-center">Average Rating <b><span class="badge <?php if( round($averageRating,1) > 69 ){ echo 'badge-info'; }else{ echo 'badge-secondary'; } ?>" style="font-size: 1em;"><?=round($averageRating,1)?></span>%</b></h4>
							</div>
							<div class="col-md-6">
								<form action="" method="POST">
										<div class="form-row align-items-center justify-content-md-center border">
										
											<div class="custom-control custom-checkbox mr-sm-2">
												<input type="checkbox" class="custom-control-input" name="rev_status" id="rev_status" value="1" <?php if( $revItem->status ){ echo 'checked'; } ?>>
												<label class="custom-control-label" for="rev_status">Check to show front</label>
											</div>
											<div class="col-auto my-1">
												<button type="submit" name="status_change" class="btn btn-info" >Save</button>
											</div>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
					<div class="container-fluid">
						<div class="container-fluid border border-info wow flipInX">
							<br>
							<h5 class="text-center">First Rating is <b><span class="badge badge-info" style="font-size: 1em;"><?=$revItem->first_rating?></span>/</b><small><span class="badge badge-secondary">10</span></small></h5>
							<br>
						</div>
					</div>
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
					<div class="card-body" id="cat_add_form">
						
						<ul class="list-group wow bounceInRight">
						<?php 
							foreach($revItem_ques as $q_k => $q_v){ // pre($q_v); ?>
								
								<li class="list-group-item">
									<b><?php echo $q_k *1 +1; ?>.</b> <?php echo $q_v->question; ?><h4 class="float-right"><span class="badge badge-info"><?php echo $q_v->review; ?></span><b>/</b><small><span class="badge badge-secondary">10</span></small></h4>
								</li>
						<?php	} ?>
						</ul>
					  <div class="form-group wow flipInX">
						 <label for="post_title">Comments </label>
						<textarea name="question" id="question" class="form-control" rows=""><?php echo $revItem->rev_comment; ?></textarea>
					  </div>
					  <div class="form-group wow flipInX">
						 <label for="post_title">About experience </label>
						<textarea name="question" id="question" class="form-control" rows=""><?php echo $revItem->rev_about_experience; ?></textarea>
					  </div>
						<br>
					  <div class="row wow flipInX">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="exampleInputEmail1">First Name</label>
									<input type="text" class="form-control" value="<?php echo $revItem->firstname; ?>" />
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Last Name</label>
									<input type="text" class="form-control" value="<?php echo $revItem->lastname; ?>" />
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control" value="<?php echo $revItem->email; ?>" />
								</div>
							</div>
					  </div>
					  <div class="row wow bounceInRight">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="exampleInputEmail1">Phone</label>
									<input type="text" class="form-control" value="<?php echo $revItem->phone; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="exampleInputEmail1">Address</label>
									<input type="text" class="form-control" value="<?php echo $revItem->address; ?>" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="exampleInputEmail1">City, state, ZIP</label>
									<input type="text" class="form-control" value="<?php echo $revItem->street; ?>" />
								</div>
							</div>
					  </div>
					</div>
				  <!-- /.box-body -->		
			
			  </div>
			</div>
			<div class="col-md-3">
				
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