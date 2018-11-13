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
						<textarea name="question" id="question" class="form-control" rows=""></textarea>
					  </div>
						  <div class="row">
							  <div class="col-md-6">
								<div class="row">
								  <div class="btn" data-toggle="buttons">
										<div class="btn-group-vertical">
										  <label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
											 <input type="radio" value="yes_no" name="answer_option" id="option1" > 
											 Answer get by Yes/No options
										  </label>
										
										  <label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
											 <input type="radio" value="rev_1_10" name="answer_option" id="option3" >
												Answer get by 1 to 10 reviewing options
										  </label>
										
										</div>
									</div>
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