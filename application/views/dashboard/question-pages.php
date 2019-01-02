<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

		<div class="row">
	
			<div class="col">
				<!-- Default box -->
				<div class="card">

<<<<<<< HEAD
				  <div class="card-header with-border wow bounceInDown">
					 <h4 class="card-title card-box"><?php if( $pageType == 'edit' ){ echo 'Edit page ' . '<i><small class="border border-white"><a href="'. base_url('front/review/' . $pgid) .'"> &nbsp; Front View &nbsp; </a></small></i>'; }else{ echo 'New Page'; }?></h4>
					 
					</div>
				  <div class="card-body border border-danger">
					 <h3 class="card-title box-title">Selected questions : </h3>
					<?php if( $this->session->flashdata('remvoe_success') ){ ?>
								<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('remvoe_success'); ?></div>
					<?php } ?>
					<br>
=======
					  <ul class="list-group list-group-flush">
						 <?php 
							foreach( $pgs as $pg_k => $pg_v ){
								$trClass = ($pg_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
							//	if( $edit_item == $pg_v->id ){
							//		$trClass .= ' table-active';
							//	}
							//	$trClass .= $pg_v->status ? '' : ' tr_disabled';
								
							?>
							<li class="list-group-item">
								<a href="<?=base_url('dashboard/settings/question_pages/'.$pg_v->id)?>">
									<h4><?=($pg_k+1).'. '.$pg_v->pg_title.' <small><i>['.$pg_v->id.']</i></small>'?> <?php if( $pgid == $pg_v->id ){ echo '<span class="badge badge-warning float-right"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </span>'; } ?></h4>
								</a>
							</li>
							<?php } ?>
						</ul>
			  </div>
			</div>

			<div class="col">
				<!-- Default box -->
				<div class="card">
				    <div class="card-header with-border wow bounceInDown">
                        <h4 class="card-title card-box">
							<?php if( $pageType == 'edit' ){ echo 'Edit page ' . '<i><small class="border border-white"><a href="'. base_url('front/review/' . $pgid) .'" target="_blank"> &nbsp; Front View &nbsp; </a></small></i>'; } else { echo 'New Page'; }?>
                        </h4>
					    <a href="<?=base_url('dashboard/settings/question_pages')?>" class="btn btn-info float-right btn-sm" data-toggle="tooltip" style="position: absolute;right: 0;z-index: 1;" title=""> + New page </a>
					</div>
				  <div class="card-body border border-danger">
					<h3 class="card-title box-title">Selected questions : </h3>
                    <?php if( $this->session->flashdata('remove_success') ){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('remove_success'); ?>
                        </div>
                    <?php } ?>
>>>>>>> b87b75e804b5936dd7b0eee2f74a0a09ba14d1c3
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
					<?php } ?>

					<form action="" method="post" class="">
						<label for="pg_title" class="control-label">Page Title</label>
<<<<<<< HEAD
						<input type="text" name="pg_title" id="pg_title" class="form-control" value="<?php if(isset($thePage->pg_title)){ echo$thePage->pg_title; } ?>" />
=======
						<input type="text" name="pg_title" id="pg_title" class="form-control" value="<?php if(isset($thePage->pg_title)){ echo $thePage->pg_title; } ?>" />
>>>>>>> b87b75e804b5936dd7b0eee2f74a0a09ba14d1c3
						<br>
						<ul id="selected_questions" class="connectedSortable list-group list-group-flush" style="min-height: 40px;list-style: none;background: #eee;">
							<?php 
							if( $pageType == 'edit' ){
								
								if( isset($thePageQs) ){
									foreach( $thePageQs as $pgq ){ ?>

										<li class="list-group-item draging">
											<input value="<?=$pgq->qid?>" name="qid[]" size="2" hidden >
<<<<<<< HEAD
											<?=$pgq->question . ' <i>['. $pgq->qid .']</i>'?>
=======
											<?=$pgq->question. '.<small><i>['.$pgq->qid.']</i></small>';?>
>>>>>>> b87b75e804b5936dd7b0eee2f74a0a09ba14d1c3
										</li>
								<?php }
								}
							}else{
								foreach( $def_questions as $dq ){ ?>
									<li class="list-group-item draging">
										<input value="<?=$dq->qid?>" name="qid[]" size="2" hidden >
<<<<<<< HEAD
										<?=$dq->question . ' <i>['. $dq->qid .']</i>'?>
=======
										<?=$dq->question. '.<small><i>['.$dq->qid.']</i></small>';?>
>>>>>>> b87b75e804b5936dd7b0eee2f74a0a09ba14d1c3
									</li>
							<?php }
							}
							?>
						</ul>
						<br>
						<?php if( $pageType == 'edit' ){ ?>
<<<<<<< HEAD
								
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_edit">Save your change</button>
						<?php }else{ ?>
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_save"> Save </button>
=======
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_edit"><i class="fa fa-edit"></i> Save your change</button>
						<?php }else{ ?>
							<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_save"><i class="fa fa-check"></i> Save Page </button>
>>>>>>> b87b75e804b5936dd7b0eee2f74a0a09ba14d1c3
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
						 <?php 
							if( count($ques) == 0 ){ ?>
								
								<li class="list-group-item draging">
									No questions 
									<a href="<?=base_url('/')?>dashboard/settings/rev_question_add" class="btn btn-outline-warning btn-block">Add new question</a>
								</li>
							<?php }
							foreach( $ques as $qus_k => $qus_v ){
								$trClass = ($qus_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
							//	if( $edit_item == $qus_v->id ){
							//		$trClass .= ' table-active';
							//	}
							//	$trClass .= $qus_v->status ? '' : ' tr_disabled';
							?>
								<li class="list-group-item draging">
									<input value="<?=$qus_v->qid?>" name="qid[]" size="2" hidden>
									<?=$qus_v->question . ' <i>['. $qus_v->qid .']</i>'?>
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

			