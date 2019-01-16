<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
		
			<?php if( $this->logedin_user->usertype == 'superadmin' ){ ?>
				<div class="row">
				
					<div class="col-md-4">
						<div class="card">
							<div class="card-header with-border wow bounceInLeft">
								<h4 class="card-title card-box"><?=$sc_v->title?></h4>
							</div>

							<ul id="all_questions" class=" list-group list-group-flush">
							<?php 
								foreach( $sc_v->questions as $sc_v_k => $sc_v_v ){
								?>
									<li class="list-group-item <?=$trClass?>" data-qid="<?=$sc_v_v->qid?>">
										<input value="<?=$sc_v_v->qid?>" name="qid[]" size="2" hidden>
										<b><?=$sc_v_k+1?>. </b>
										<span class="qs"><?=$sc_v_v->question . '</span> <br><i>['. $sc_v_v->qid .']</i>'?>
										<?php echo '<span class="ans" hidden>'. $sc_v_v->answer_option .'</span>'; ?> <?php echo $status . '<span class="sts" hidden>'. $sc_v_v->status .'</span>'; ?> 
										<button data-qid="<?php echo  $sc_v_v->qid; ?>" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title=""><i class="fa fa-fw fa-lg fa-edit"></i></button>
										<!-- <a href="http://exceleratings.local/dashboard/superadmin/service_category_remove/3" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this item?');" title="To remove this item">
											<i class="fa fa-fw fa-lg fa-close"></i>
										</a> -->

										<button onclick="rem_rev_questions(<?php echo  $sc_v_v->qid; ?>)" class="btn btn-outline-secondary btn-sm"><i class="fa fa-fw fa-lg fa-close"></i></button>

									</li>
								<?php } ?> 
							</ul>
						</div>
					</div>
						
				</div>
			<?php } ?>
			<?php $this->load->view('dashboard/rev-question-list'); ?>
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
    </section>

  </div>
  <!-- /.content-wrapper -->
	
<?php $this->load->view('dashboard/footer'); ?>

			