<?php $this->load->view('dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

		<div class="row">
			<div class="col">

				<!-- Default box -->
				<div class="card">
					<div class="card-header with-border wow bounceInLeft">
						<h4 class="card-title card-box">Review questions page list</h4>
					</div>

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
									<h4><?=($pg_k+1) . '. ' . $pg_v->pg_title?> <?php if( $pgid == $pg_v->id ){ echo '<span class="badge badge-warning float-right"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </span>'; } ?></h4>
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
                            <?php if( $this->logedin_user->usertype == 'generaluser' ){ ?>
                                <?php if(isset($thePage->pg_title)){ echo $thePage->pg_title; } else { echo "Questions List"; } ?>
                            <?php } else { ?>
                                <?php if( $pageType == 'edit' ){ echo 'Edit page ' . '<i><small class="border border-white"><a href="'. base_url('front/review/' . $pgid) .'" target="_blank"> &nbsp; Front View &nbsp; </a></small></i>'; } else { echo 'New Page'; }?>
                            <?php } ?>
                        </h4>
					    <?php if( $this->logedin_user->usertype != 'generaluser' ){ ?>
							<a href="<?=base_url('dashboard/settings/question_pages')?>" class="btn btn-info float-right btn-sm" data-toggle="tooltip" style="position: absolute;right: 0;z-index: 1;" title=""> + New page </a>
						<?php }?>
					</div>
				  <div class="card-body">
					<h3 class="card-title box-title">Selected questions : </h3>
                    <?php if( $this->session->flashdata('remove_success') ){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('remove_success'); ?>
                        </div>
                    <?php } ?>
					<?php if( $this->session->flashdata('success') ){ ?>
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?> 
                    
					<form action="" method="post" class="">
						<?php if( $this->logedin_user->usertype != 'generaluser' ){ ?>
							<label for="pg_title" class="control-label">Page Title</label>
							<input type="text" name="pg_title" id="pg_title" class="form-control" value="<?php if(isset($thePage->pg_title)){ echo $thePage->pg_title; } ?>" />
						<?php }?>
						<br>
						<ul id="selected_questions" class="connectedSortable list-group list-group-flush" style="min-height: 40px;list-style: none;background: #eee;">
							<?php 
							if( $pageType == 'edit' ){
								
								if( isset($thePageQs) ){
									foreach( $thePageQs as $pgq ){ ?>

										<li class="list-group-item draging">
											<input value="<?=$pgq->qid?>" name="qid[]" size="2" hidden >
											<?=$pgq->question;?>
										</li>
								<?php }
								}
							}else{
								foreach( $def_questions as $dq ){ ?>
									<li class="list-group-item draging">
										<input value="<?=$dq->qid?>" name="qid[]" size="2" hidden >
										<?=$dq->question;?>
									</li>
							<?php }
							}
							?>
						</ul>
						<br>
						<?php if( $this->logedin_user->usertype != 'generaluser' ){ ?>
							<?php if( $pageType == 'edit' ){ ?>
								<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_edit"><i class="fa fa-edit"></i> Save your change</button>
							<?php }else{ ?>
								<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_save"><i class="fa fa-check"></i> Save Page </button>
							<?php } ?>
						<?php } else {?>
							<?php if( $pageType == 'edit' ){ ?>
								<a href="<?=base_url('front/review/' . $pgid); ?>" target="_blank" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Answer this questions </a>
							<?php } ?>
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

			