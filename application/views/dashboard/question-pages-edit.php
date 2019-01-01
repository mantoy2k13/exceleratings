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
						<h4 class="card-title card-box">Page list</h4>
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
							 <li class="list-group-item"><?=$pg_v->pg_title?></li>
							<?php } ?>
						</ul>
			  </div>
			</div>

			<div class="col">
				<!-- Default box -->
				<div class="card">

				  <div class="card-header with-border wow bounceInDown">
					 <h4 class="card-title card-box">New Page</h4>
					 <a href="<?=base_url('dashboard/settings/notification_contacts')?>" class="btn btn-info float-right btn-sm" data-toggle="tooltip" style="position: absolute;right: 0;z-index: 1;" title="">
										+ New page
									</a>
					</div>
				  <div class="card-body">
					 <h3 class="card-title box-title">Selected questions : </h3>
					<?php if( $this->session->flashdata('remove_success') ){ ?>
								<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('remove_success'); ?></div>
					<?php } ?>
					<br>
					<form action="" method="post">
						<label for="pg_title" class="control-label">Page Title</label>
						<input type="text" name="pg_title" id="pg_title" class="form-control" />
						<br>
						<ul id="selected_questions" class="connectedSortable list-group list-group-flush" style="min-height: 40px;list-style: none;background: #eee;"></ul>
						<br>
						<button type="submit" class="btn btn-info btn-block" name="submit" value="q_pg_save">Save</button>
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
								<li class="list-group-item">
									<input value="<?=$qus_v->qid?>" name="qid[]" size="2" hidden>
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

			