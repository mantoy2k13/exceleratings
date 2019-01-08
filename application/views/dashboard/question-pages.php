<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

		<div class="row">
	
			<div class="col">
				<!-- Default box -->
				<div class="card">

				  <div class="card-header with-border wow bounceInDown">
					 <h4 class="card-title card-box"><?php if( $pageType == 'edit' ){ echo 'Edit page ' . '<i><a href="'. base_url('front/review/' . $pgid) .'" class="float-right btn btn-outline-danger btn-sm" style="font"><i class="fa fa-eye"></i> Front View </a></i>'; }else{ echo 'New Page'; }?></h4>
					 
					</div>
				  <div class="card-body border border-danger">
					 <h3 class="card-title box-title">Selected questions : </h3>
					<?php if( $this->session->flashdata('remvoe_success') ){ ?>
								<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('remvoe_success'); ?></div>
					<?php } ?>
					<br>
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
					<?php } ?>
					<?php if( $this->session->flashdata('error') ){ ?>
						<div class="alert alert-danger" role="alert"><h4><?php echo $this->session->flashdata('error'); ?></h4></div>
					<?php } ?>
					
					<form action="" method="post" class="">
						<label for="pg_title" class="control-label">Page Title</label>
						<input type="text" name="pg_title" id="pg_title" class="form-control" value="<?php if(isset($thePage->pg_title)){ echo$thePage->pg_title; } ?>" />
						<br>
						<ul id="selected_questions" class="connectedSortable list-group list-group-flush" style="min-height: 40px;list-style: none;background: #eee;">
							<?php 
							if( $pageType == 'edit' ){
								
								if( isset($thePageQs) ){
									foreach( $thePageQs as $pgq ){ ?>

										<li class="list-group-item draging">
											<input value="<?=$pgq->qid?>" name="qid[]" size="2" hidden >
											<?php //$pgq->question . ' <i>['. $pgq->qid .']</i>'?>
											<?=$pgq->question?>
										</li>
								<?php }
								}
							}else{
								foreach( $def_questions as $dq ){ ?>
									<li class="list-group-item draging">
										<input value="<?=$dq->qid?>" name="qid[]" size="2" hidden >
										<?php //$dq->question . ' <i>['. $dq->qid .']</i>'?>
										<?=$dq->question?>
									</li>
							<?php }
							}
							?>
						</ul>
						<br>
						<?php if( $pageType == 'edit' ){ ?>
								
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_edit">Save your change</button>
						<?php }else{ ?>
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_save"> Save </button>
						<?php } ?>
					</form>
				  </div>
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<div class="col">

				<!-- Default box -->
				<div class="card">
					<div class="card-header with-border wow bounceInRight">
						<h4 class="card-title card-box">All Questions</h4>
					</div>
						<ul id="all_questions" class="connectedSortable list-group list-group-flush">
							<li class="list-group-item draging">
							 <?php 
								if( count($ques) == 0 ){ ?>
										No questions 
								<?php } ?>
								<a href="<?=base_url('/')?>dashboard/settings/rev_question_add" class="btn btn-outline-warning btn-block">Add new question</a>
							</li>
							<?php 
							foreach( $ques as $qus_k => $qus_v ){
								$trClass = ($qus_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
							//	if( $edit_item == $qus_v->id ){
							//		$trClass .= ' table-active';
							//	}
							//	$trClass .= $qus_v->status ? '' : ' tr_disabled';
							?>
								<li class="list-group-item draging">
									<input value="<?=$qus_v->qid?>" name="qid[]" size="2" hidden>
									<?php //$qus_v->question . ' <i>['. $qus_v->qid .']</i>'?>
									<?=$qus_v->question?>
								</li>
							<?php } ?> 
						</ul>
			  </div>
			</div>

      </div>

    </section>

  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('dashboard/footer'); ?>

			