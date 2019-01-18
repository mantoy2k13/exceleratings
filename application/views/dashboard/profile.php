<?php $this->load->view('dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

	  <div class="breadcrumbs">
			<div class="breadcrumbs-inner">
				 <div class="row m-0">
					  <div class="col-sm-12">
								 <div class="page-title">
										  <h1>Profile</h1>
										  <hr>
								 </div>
					  </div>
				 </div>
			</div>
	  </div>

    <!-- Main content -->
    <section class="content">

      <form action="" method="post" enctype="multipart/form-data">
			<div class="row">
			<?php if( $this->session->flashdata('success') ){ ?>
				
				<div class="container-fluid">
					<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
				</div>
			<?php } ?>
			</div>
			<div class="row">
			  <div class="col-md-3">

				<?php if( $this->session->userdata('logedin_user')->usertype == 'superadmin'  ){ ?>
					<?php if( $profile->usertype == 'superadmin'  ){ ?>
						<div class="alert alert-info alert-dismissible fade show" role="alert">
						  <i><strong>SuperAdmin</strong></i>
						</div>
					<?php } else{ ?>
						
						<div class="custom-control custom-radio">
						  <input type="radio" id="usertype_gadmin" name="usertype" class="custom-control-input" value="generaladmin" <?php if( $profile->usertype == 'generaladmin' ){ echo 'checked'; }?>>
						  <label class="custom-control-label" for="usertype_gadmin">General Admin</label>
						</div>
						<div class="custom-control custom-radio">
						  <input type="radio" id="usertype_guser" name="usertype" class="custom-control-input" value="generaluser" <?php if( $profile->usertype == 'generaluser' ){ echo 'checked'; }?>>
						  <label class="custom-control-label" for="usertype_guser">General User</label>
						</div>
					<?php } ?>
				<?php }else{ ?>
						<div class="alert alert-info alert-dismissible fade show" role="alert">
						  <i><strong><?php if( $profile->usertype == 'generaladmin' ){ echo 'General Admin'; }elseif( $profile->usertype == 'generaluser' ){ echo 'General User'; }?></strong> <small>(User type)</small></i>
						</div>
					<?php } ?>
				 <!-- Profile Image -->
				 <div class="card card-primary wow bounceInRight">
					<div class="card-body card-profile">
						<div class="video_up_with_prog">
							<label for="profilePic">Profile Picture</label>
							<input type="file" name="profilePic" id="profilePic" class="form-control media_upload_prev" data-act-name="profilePic_val">
							<div id="imgPreview" class="actions_prev">
								<?php 
									if( $profile->profilpic ){ ?>
										<img src="<?php echo base_url('uploads/profile-pic/' . $profile->profilpic); ?>" class="img-thumbnail"/>
									<?php } ?>
							</div>
							<input type="hidden" name="profilePic_hid" id="profilePic_hid" value="<?php echo $profile->profilpic; ?>">
						</div>
					</div>
					<!-- /.box-body -->
				 </div>
				 <!-- /.box -->
				<?php 
					if( $this->logedin_usertype == 'superadmin' ){
						if( $profile->usertype == 'generaluser' ){ ?>
							
							 <!-- Profile Image -->
							 <div class="card card-primary wow bounceInRight">
								<div class="card-body card-profile">
									<h4>Subscription</h4>
									<hr>
									<?php 										
										foreach( $subs as $sbs ){ ?>
										<div class="custom-control custom-radio">
										  <input type="radio" id="<?php echo $sbs->spk_id; ?>" name="user_subs" class="custom-control-input" value="<?php echo $sbs->spk_slug; ?>" <?php if( $profile->subs_package_slug == $sbs->spk_slug ){ echo 'checked'; } ?> >
										  <label class="custom-control-label" for="<?php echo $sbs->spk_id; ?>"><b><?php echo $sbs->spk_title; ?></b></label>
										</div>
									<?php	} ?>
								</div>
								<!-- /.box-body -->
							 </div>
							 <!-- /.box -->
						<?php } ?>
					<?php }elseif( $this->logedin_usertype == 'generaluser' ){ ?>
						<?php 
						//	pre($profile);
						?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <i><strong><?php echo $profile->spk_title; ?></strong> (Subscription Plan)</i>
							</div>
					<?php } ?>

			  </div>
			  <!-- /.col -->
			  <div class="col-md-5">

				 <!-- Profile Image -->
				 <div class="card card-primary wow bounceInLeft">
					<div class="card-body card-profile">
						<div class="form-group">
						  <label for="fullname" class="control-label">Full Name</label>
							 <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $profile->fullname; ?>" placeholder="Full Name">
						</div>
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
								  <label for="email" class="control-label">Email</label>
									 <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $profile->email; ?>" >
								</div>
							</div>
							<div class="col-sm-4">
								  <label for="email" class="control-label">Username</label>
									<br>
									<p><b><i><?php echo $profile->username; ?></b></i></p>
							</div>
						</div>

						  <?php if( $this->logedin_user->usertype != 'superadmin' ){ ?>
						  <div class="form-group">
							 <label for="post_title">Services Category/Type</label>
							 <select name="service_category" class="form-control">
								<option value="0"> -- Select -- </option>
							<?php
								foreach( $service_categories as $sc_k => $sc_v ){ ?> 
								<option value="<?=$sc_v->id?>" <?=($profile->service_category == $sc_v->id) ? 'selected' : ''?>><?=$sc_v->title?></option> 
							<?php } ?> 
							 </select>
						  </div>
						  <?php } ?>
						<div class="form-group">
						  <label for="about" class="control-label">About</label>
							 <textarea class="form-control" id="about" name="about" rows="5" placeholder="About"><?php echo $profile->about; ?></textarea>
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" name="profile_save" class="btn btn-lg btn-info btn-block"> Save </button>
						</div>
					</div>
					<!-- /.box-body -->
				 </div>
				 <!-- /.box -->
				</div>
				<!-- /.col -->

				<div class="col-md-4">
				<?php if( $this->logedin_user->usertype != 'superadmin' ){ ?>
					<!-- Profile Image -->
					<div class="card card-primary wow bounceInLeft">
						<div class="card-body card-profile">
							<div class="form-group">
							  <label for="pos_rdr_url_google" class="control-label">Google URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_google" name="pos_rdr_url_google" value="<?php echo $profile->pos_rdr_url_google; ?>" placeholder="Google URL">
							</div>
							<div class="form-group">
							  <label for="pos_rdr_url_yelp" class="control-label">Yelp URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_yelp" name="pos_rdr_url_yelp" value="<?php echo $profile->pos_rdr_url_yelp; ?>" placeholder="Yelp URL">
							</div>
							<div class="form-group">
							  <label for="pos_rdr_url_facebook" class="control-label">Facebook URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_facebook" name="pos_rdr_url_facebook" value="<?php echo $profile->pos_rdr_url_facebook; ?>" placeholder="Facebook URL">
							</div>
							<div class="form-group">
							  <label for="pos_rdr_url_trip_advisor" class="control-label">Trip Advisor URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_trip_advisor" name="pos_rdr_url_trip_advisor" value="<?php echo $profile->pos_rdr_url_trip_advisor; ?>" placeholder="Trip Advisor URL">
							</div>
							<div class="form-group">
							  <label for="pos_rdr_url_urban_spoon" class="control-label">Urban Spoon URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_urban_spoon" name="pos_rdr_url_urban_spoon" value="<?php echo $profile->pos_rdr_url_urban_spoon; ?>" placeholder="Trip Advisor URL">
							</div>
							<div class="form-group">
							  <label for="pos_rdr_url_city_search" class="control-label">City Search URL</label>
								 <input type="text" class="form-control" id="pos_rdr_url_city_search" name="pos_rdr_url_city_search" value="<?php echo $profile->pos_rdr_url_city_search; ?>" placeholder="Trip Advisor URL">
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
				
			</div>
			<!-- /.row -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('dashboard/footer'); ?>