<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
			<!-- Default box -->
			<div class="card">
				<div class="card-header with-border wow bounceInLeft">
					<h3 class="card-title card-box">Settings</h3>
				</div>

				<form action="" method="post" >

					<?php if( $this->session->flashdata('success') ){ ?>
					<br>
					<div class="container-fluid">
						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
					</div>
					<?php } ?>
					<div class="card-body wow bounceInRight" id="cat_add_form">
						<?php 
							foreach( $seting_options as $so ){ ?>
							  <div class="form-group">
									<label for="post_title"><?php echo $so->option_title; ?></label>
									<?php if($so->input_type == 'text'){ ?>
									<input type="text" name="setting_options[<?php echo $so->option_slug; ?>]" class="form-control" value="<?php echo $so->option_value; ?>" >
									<?php }elseif( $so->input_type == 'allow_disallow' ){ ?>
										&nbsp; &nbsp; 
										<div class="custom-control custom-radio custom-control-inline border">
											&nbsp; 
										  <input type="radio" id="<?php echo $so->option_slug; ?>1" name="setting_options[<?php echo $so->option_slug; ?>]" class="custom-control-input" value="yes"  <?php if( $so->option_value == 'yes' ){ echo 'checked'; } ?>>
										  <label class="custom-control-label" for="<?php echo $so->option_slug; ?>1">Yes</label>
										  &nbsp; 
										</div>
										<div class="custom-control custom-radio custom-control-inline border">
											&nbsp; 
										  <input type="radio" id="<?php echo $so->option_slug; ?>2" name="setting_options[<?php echo $so->option_slug; ?>]" class="custom-control-input" value="no"  <?php if( $so->option_value == 'no' ){ echo 'checked'; } ?>>
										  <label class="custom-control-label" for="<?php echo $so->option_slug; ?>2">No</label>
										  &nbsp; 
										</div>
											
									<?php } ?>
							  </div>
						<?php	} ?>
						  <div class="row">
							  <div class="col-md-6">
							  
							  </div>
							  <div class="col-md-6">
									<hr>
									<div class="form-group">
										<button type="submit" name="save_setting_options" class="btn btn-lg btn-info btn-block"> Save </button>
									</div>
									<hr>
							  </div>
						  </div>
					</div>
				  <!-- /.box-body -->		
				</form>  
			  </div>
        </div>

      </div>
      <!-- /.box -->

		  <div style="clear:both;"></div>
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>