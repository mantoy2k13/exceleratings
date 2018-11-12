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
					<h3 class="card-title card-box">Single review page</h3>
				</div>

				<form action="" method="post" enctype="multipart/form-data">

					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
					<div class="card-body wow bounceInRight" id="cat_add_form">
						
						<ul class="list-group">
						<?php 
							foreach($revItem_ques as $q_k => $q_v){ // pre($q_v); ?>
								
								<li class="list-group-item">
									<b><?php echo $q_k *1 +1; ?>.</b> <?php echo $q_v->question; ?><h4 class="float-right"><span class="badge badge-info"><?php echo $q_v->review; ?></span><b>/</b><small><span class="badge badge-secondary">10</span></small></h4>
								</li>
						<?php	} ?>
						</ul>
					  <div class="form-group">
						 <label for="post_title">Comments </label>
						<textarea name="question" id="question" class="form-control" rows=""></textarea>
					  </div>
						  <div class="row">
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