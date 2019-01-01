<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
	
		<div class="row">
			<div class="col-lg-9">
				<!-- Default box -->
				<div class="card">

				  <div class="card-body">
					 <h3 class="card-title box-title">Service Categories <a href="<?=base_url('dashboard/superadmin/service_categories')?>" class="btn btn-info float-right btn-sm" data-toggle="tooltip" title="">
										+ Add New
									</a></h3>
					<?php if( $this->session->flashdata('remove_success') ){ ?>
						<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('remove_success'); ?></div>
					<?php } ?>
						
					  <table id="" data-uid="" class="display table table-bordered table-hover table-striped datatable  col_1_center col_1ast_center col_3_center col_4_center col_5_center col_6_center">
						 <thead>
						 <tr>
							<th>SL.</th>
							<th>Title</th>
							<th>Is active</th>
							<th>Action</th>
						 </tr>
						 </thead>
						 <tbody>
						 <?php 
							foreach( $services as $srv_k => $srv_v ){
								$trClass = ($srv_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
								if( $edit_item == $srv_v->id ){
									$trClass .= ' table-active';
								}
								$trClass .= $srv_v->status ? '' : ' tr_disabled';
								
							?>
							 <tr class="<?=$trClass?>">
								<td><?=$srv_k+1?></td>
								<td><?=$srv_v->title?></td>
								<td><?=$srv_v->status ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-secondary">Disabled</span>'?></td>
								<td>
									<a href="<?=base_url('dashboard/superadmin/service_categories/' . $srv_v->id)?>" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
										<i class="fa fa-fw fa-lg fa-edit"></i>
									</a>
									<!-- <a href="<?=base_url('dashboard/superadmin/service_category_remove/' . $srv_v->id)?>" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this item?');" title="To remove this item">
										<i class="fa fa-fw fa-lg fa-close"></i>
									</a> -->
									<a href="javascript:;" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" onclick="service_category_remove(<?=$srv_v->id; ?>)" title="To remove this item">
										<i class="fa fa-fw fa-lg fa-close"></i>
									</a>
								</td>
							 </tr>
							<?php } ?>
						 </tbody>
						 <tfoot>
						 <tr>
							<th>SL.</th>
							<th>Title</th>
							<th>Is active</th>
							<th>Action</th>
						 </tr>
						 </tfoot>
					  </table>
				  </div>
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<div class="col-lg-3">

				<!-- Default box -->
				<div class="card">
					<div class="card-header with-border wow bounceInLeft">
					<?php 
						if( $page_env == 'addnew' ){ ?>
						<h4 class="card-title card-box">Add Service category</h4>
					<?php	}elseif( $page_env == 'edit' ){ ?> 
						<h4 class="card-title card-box">Edit Service category</h4>
					<?php } ?>
					</div>
					
				<form action="" method="post" enctype="multipart/form-data">
					
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>
					<?php 
						if( $page_env == 'addnew' ){ ?>
							
						<div class="card-body wow bounceInRight" id="">
							
						  <div class="form-group">
								<label for="post_title">Title</label>
								<input type="text" name="title" id="" class="form-control" />
						  </div>
						  <div class="container-fluid">
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" class="custom-control-input" name="status" id="status" checked value="1" >
									<label class="custom-control-label" for="status">Check to active</label>
								</div>
								<hr>
								<div class="row">
									<button type="submit" name="add_contact" class="btn btn-info btn-block"> < &nbsp; Add New </button>
								</div>
								
						  </div>
						</div>
					<?php	}elseif( $page_env == 'edit' ){ ?> 

						<div class="card-body wow bounceInRight" id="">
							
						  <div class="form-group">
								<label for="post_title">Title</label>
								<input type="text" name="title" id="" class="form-control" value="<?=$serviceItem->title?>" />
						  </div>
						  <div class="container-fluid">
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php if( $serviceItem->status ){ echo 'checked'; } ?>>
									<label class="custom-control-label" for="status">Check to active</label>
								</div>
								<hr>
								<div class="row">
									<button type="submit" name="edit_contact" class="btn btn-info btn-block"> < &nbsp; Save change </button>
								</div>
								
						  </div>
						</div>
					<?php } ?>
				  <!-- /.box-body -->		
				</form>  
			  </div>
			</div>

      </div>
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>