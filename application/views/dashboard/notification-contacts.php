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
                        <h3 class="card-title box-title"><i class="fa fa-users"></i> Notification contacts 
                        <a href="<?=base_url('dashboard/settings/notification_contacts')?>" class="btn btn-info float-right btn-sm"><i class="fa fa-plus"></i> Add New </a></h3><br>
 
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

                        <table id="tbl_contact" class="display table table-bordered table-hover table-striped datatable  col_1_center col_1ast_center col_3_center col_4_center col_5_center col_6_center">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Is active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $contacts as $con_k => $con_v ){ 
                                    $trClass = ($con_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
                                    if( $edit_item == $con_v->id ){
                                        $trClass .= ' table-active';
                                    }
                                    $trClass .= $con_v->status ? '' : ' tr_disabled';
                                ?>
                                    <tr class="<?=$trClass?>">
                                        <td><?=$con_k+1?></td>
                                        <td><?=$con_v->title?></td>
                                        <td><?=$con_v->email?></td>
                                        <td><?=$con_v->phone?></td>
                                        <td><?=$con_v->status ? '<span class="badge badge-info">Activate</span>' : '<span class="badge badge-secondary">Disabled</span>'?></td>
                                        <td>
                                            <a href="<?=base_url('dashboard/settings/notification_contacts/' . $con_v->id)?>" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" onclick="notification_contact_remove(<?=$con_v->id; ?>)" title="To remove this contact">
                                                <i class="fa fa-fw fa-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
						<h4 class="card-title card-box"><i class="fa fa-user-plus"></i> Add contact</h4>
					<?php	}elseif( $page_env == 'edit' ){ ?> 
						<h4 class="card-title card-box"><i class="fa fa-pencil-square-o"></i> Edit contact</h4>
					<?php } ?>
					</div>
					
				<form action="" method="post" enctype="multipart/form-data">
					<?php 
						if( $page_env == 'addnew' ){ ?>
							
						<div class="card-body wow bounceInRight" id="">
							
						  <div class="form-group">
								<label for="post_title">Title</label>
								<input type="text" name="title" id="" class="form-control" required/>
						  </div>
						  <div class="form-group">
								<label for="post_title">Email</label>
								<input type="email" name="email" id="" class="form-control" required/>
						  </div>
						  <div class="form-group">
								<label for="post_title">Phone number</label>
								<input type="text" name="phone" id="" class="form-control" required/>
						  </div>
						  <div class="container-fluid">
								<hr>
								<div class="row">
									<button type="submit" name="add_contact" class="btn btn-info btn-block"> <i class="fa fa-plus"></i> Add New </button>
								</div>
						  </div>
						</div>
					<?php }elseif( $page_env == 'edit' ){ ?> 

						<div class="card-body wow bounceInRight" id="">
							
						  <div class="form-group">
								<label for="post_title">Title</label>
								<input type="text" name="title" id="" class="form-control" value="<?=$contItem->title?>" />
						  </div>
						  <div class="form-group">
								<label for="post_title">Email</label>
								<input type="email" name="email" id="" class="form-control" value="<?=$contItem->email?>" />
						  </div>
						  <div class="form-group">
								<label for="post_title">Phone number</label>
								<input type="text" name="phone" id="" class="form-control" value="<?=$contItem->phone?>" />
						  </div>
						  <div class="container-fluid">
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" class="custom-control-input" name="status" id="status" value="1" <?php if( $contItem->status ){ echo 'checked'; } ?>>
									<label class="custom-control-label" for="status">Check to active</label>
								</div>
								<hr>
								<div class="row">
									<button type="submit" name="edit_contact" class="btn btn-info btn-block"> <i class="fa fa-pencil-square-o"></i> Save change </button>
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