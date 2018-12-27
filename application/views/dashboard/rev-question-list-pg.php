<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
		
			<?php 
				if( $this->logedin_user->usertype == 'superadmin' ){ ?>
				<div class="row">
				<?php
					foreach( $service_categories as $sc_k => $sc_v ){ ?>
					<div class="col-md-4">
						
						<div class="card">
							<div class="card-header with-border wow bounceInLeft">
								<h4 class="card-title card-box"><?=$sc_v->title?></h4>
							</div>

							<ul id="all_questions" class="connectedSortable list-group list-group-flush">
							 <?php 
								foreach( $sc_v->questions as $sc_v_k => $sc_v_v ){
									$trClass = ($sc_v_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
								?>
									<li class="list-group-item draging <?=$trClass?>">
										<input value="<?=$sc_v_v->qid?>" name="qid[]" size="2" hidden>
										<span class="qs"><?=$sc_v_v->question . '</span> <i>['. $sc_v_v->qid .']</i>'?>
										<button data-qid="<?php echo  $sc_v_v->qid; ?>" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title=""><i class="fa fa-fw fa-lg fa-edit"></i></button>
									</li>
								<?php } ?> 
							</ul>
					  </div>
					</div>
				<?php	} ?>
				</div>
			<?php	} ?>
			<?php $this->load->view('dashboard/rev-question-list'); ?>
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->

    </section>

  </div>
  <!-- /.content-wrapper -->
	

	
<?php $this->load->view('dashboard/footer'); ?>

			