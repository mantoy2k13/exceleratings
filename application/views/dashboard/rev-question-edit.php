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
					<h3 class="card-title card-box">Review question add form</h3>
				</div>

				<form action="" method="post" enctype="multipart/form-data">

					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
					<div class="card-body wow bounceInRight" id="cat_add_form">
						
					  <div class="form-group">
						 <label for="post_title">The Question</label>
						<textarea name="question" id="question" class="form-control" rows=""><?php echo $question->question; ?></textarea>
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
							<div class="row">
							  <div class="btn" data-toggle="buttons">
									<div class="btn-group-vertical">
									  <label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
										 <input type="radio" value="yes_no" name="answer_option" id="" <?php if( $question->answer_option == 'yes_no' ){ echo 'checked'; } ?>> 
										 Get Answers by Yes/No options
									  </label>
									
									  <label class="btn btn-sm btn-info" title="Get Answers by 1 to 10 reviewing options">
										 <input type="radio" value="rev_1_10" name="answer_option" id="" <?php if( $question->answer_option == 'rev_1_10' ){ echo 'checked'; } ?>>
											Get Answers by in 1-10 review points
									  </label>
									
									</div>
								</div>
								</div>
						  </div>
						  <div class="col-md-6">
								<hr>
								<div class="form-group">
									<button type="submit" name="rev_question_update" class="btn btn-lg btn-info btn-block"> Save </button>
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