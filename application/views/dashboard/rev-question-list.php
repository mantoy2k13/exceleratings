<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All question list</h3>
            </div>
            <!-- /.box-header -->
					
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
              <table id="questionList" class="table table-bordered table-hover table-striped col_1_center datatable col_4_center col_1ast_center wow bounceInLeft">
                <thead>
                <tr>
                  <th>SL.</th>
                  <th>Question Title</th>
                  <th>Ans Option</th>
                  <th>Status</th>
                  <th>Acction</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td>Loading .... </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>SL.</th>
                  <th>Question Title</th>
                  <th>Ans Option</th>
                  <th>Status</th>
                  <th>Acction</th>
                </tr>
                </tfoot>
              </table>
          </div>
          <!-- /.box -->

        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->

    </section>

  </div>
  <!-- /.content-wrapper -->
  

			<div class="modal fade " id="qusEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				 <div class="modal-content">
					<div class="modal-header">
					  <h3 class="modal-title" id="exampleModalLabel">Question edit form</h3>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
						<form action="<?php echo base_url('dashboard/settings/'); ?>rev_question_edit" method="post" enctype="multipart/form-data">
						  <div class="form-group">
							 <label for="post_title">The Question</label>
							<textarea name="question" id="question" class="form-control" rows=""><?php // echo $question->question; ?></textarea>
							<input type="hidden" name="qid"/>
						  </div>
							  <div class="row">
								  <div class="col-md-6">
									<div class="row">
									  <div class="btn" data-toggle="buttons">
											<div class="btn-group-vertical">
											  <label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
												 <input type="radio" value="yes_no" name="answer_option" class="answer_option"> 
												 Answer get by Yes/No options
											  </label>
											
											  <label class="btn btn-sm btn-info" title="Answer get by 1 to 5 reviewing options">
												 <input type="radio" value="rev_1_5" name="answer_option" class="answer_option"> 
													Answer get by 1 to 5 reviewing options
											  </label>
											
											  <label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												 <input type="radio" value="rev_1_10" name="answer_option" class="answer_option">
													Answer get by 1 to 10 reviewing options
											  </label>
											
											</div>
										</div>
									</div>
								  </div>
								  <div class="col-md-6">
										<div class="row">
										  <div class="btn" data-toggle="buttons">
												<div class="btn-group">
												  <label class="btn btn-sm btn-info" title="Active">
													 <input type="radio" value="1" name="status" class="status_option"> 
														Active
												  </label>
												
												  <label class="btn btn-sm btn-secondary" title="Inactive">
													 <input type="radio" value="0" name="status" class="status_option">
														Inactive
												  </label>
												
												</div>
											</div>
										</div>
										<br>
										<div class="form-group">
											<button type="submit" name="rev_question_update" class="btn btn-lg btn-info btn-block"> Save </button>
										</div>
								  </div>
							  </div>
							</form>
						</div>
					</div>
				 </div>
			  </div>
			</div>
			
  
<?php $this->load->view('dashboard/footer'); ?>

			