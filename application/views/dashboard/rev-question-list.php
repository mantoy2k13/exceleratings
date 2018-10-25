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

					<ul class="list-group question_list">
					  <?php 
						foreach( $ques as $q_k => $q_v ){ 
									
						$answer_option = '';
						if( $q_v->answer_option == 'yes_no' ){
							$answer_option = 'Yes/No selection';
						}else if( $q_v->answer_option == 'rev_1_5' ){
							$answer_option = 'Review 1-5 selection';
						}else if( $q_v->answer_option == 'rev_1_10' ){
							$answer_option = 'Review 1-10 selection';
						}
						
						$status = '<span class="badge badge-info">ACTIVE</span>';
						$inactClass = '';
						if( $q_v->status == '0' ){
							$status = 'Inactive';
							$inactClass = 'inactive';
						}
						?>
							<li class="list-group-item <?php echo $inactClass; ?>">
								<i class="fa fa-arrows fa-lg float-left qShorting" aria-hidden="true"></i> 
								<h3 class="q_qnt float-left"><span class="border border-white"><?php echo $q_k * 1 +1; ?></span></h3>
								<span class="act float-right">
									<button data-qid="<?php echo  $q_v->qid; ?>" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
									<i class="fa fa-fw fa-lg fa-eye"></i> / <i class="fa fa-fw fa-lg fa-edit"></i></button> &nbsp; 
									<button type="button" class="btn btn-outline-secondary btn-sm toremove" data-toggle="tooltip" data-id="<?php echo $q_v->qid; ?>">
									<i class="fa fa-fw fa-lg fa-close"></i></button>
								</span>
								<b class="qs"><?php echo $q_v->question; ?></b><br>
								<?php echo $answer_option . '<span class="ans" hidden>'. $q_v->answer_option .'</span>'; ?> &nbsp; | &nbsp; <?php echo $status . '<span class="sts" hidden>'. $q_v->status .'</span>'; ?> 
							</li>
						<?php } ?>
					</ul>
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
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" <?php // if($advertise->status == 1 ){ echo 'checked';} ?>>
										  <label class="custom-control-label" for="status">Active</label>
										</div>
										<hr>
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

			