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

					  <ol class="list-group list-group-flush">
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
									<h4><?=($pg_k+1) . '. ' . $pg_v->pg_title?> <?php if( $pgid == $pg_v->id ){ echo '<span class="badge badge-warning float-right"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </span>'; } ?> <small><i>[<?=$pg_v->id?>]</i></small></h4>
								</a>
							</li>
							<?php } ?>
						</ol>
			  </div>
			</div>

			<div class="col">
				<!-- Default box -->
				<div class="card">

				  <div class="card-header with-border wow bounceInDown">
					 <h4 class="card-title card-box"><?php if( $pageType == 'edit' ){ echo 'Edit page'; }else{ echo 'New Page'; }?></h4>
					 <a href="<?=base_url('dashboard/settings/question_pages')?>" class="btn btn-info float-right btn-sm" data-toggle="tooltip" style="position: absolute;right: 0;z-index: 1;" title="">
										+ New page
									</a>
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
											<?=$pgq->question . ' <i>['. $pgq->qid .']</i>'?>
										</li>
								<?php }
								}
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

			