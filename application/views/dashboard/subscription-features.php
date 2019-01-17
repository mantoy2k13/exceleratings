<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">

			<form action='' method="post">
					<?php echo validation_errors('<p class="text-danger"><b>', '</b></p>'); ?>
			  <div class="form-row">
				 <div class="form-group col-md-9">
					<label for="inputCity">Feature item</label>
					<textarea class="form-control" id="sf_title" name="sf_title" rows="3" ><?php if( isset($subs_feature) ){ echo $subs_feature->sf_title; }else{ echo $this->input->post('sf_title');} ?></textarea>
				 </div>
				 <div class="form-group col-md-3">
					<label for="inputState">Packages</label>
					<select id="pac_slug" name="pac_slug" class="form-control">
					  <option value=""> - Select - </option>
						<?php
							foreach( $subs_packages as $sp_k => $sp_v ){ ?>
								<option value="<?=$sp_v->spk_slug?>" <?php if( isset($subs_feature) ){ if( $subs_feature->pac_slug == $sp_v->spk_slug ){ echo 'selected'; } } ?> ><?=$sp_v->spk_title?></option>
						<?php } ?> 
					</select>
					<br>
					<?php if( isset($subs_feature) ){ ?>
						<button type="submit" name="subs_feature_add" class="btn btn-primary btn-block mb-2"> Edit </button>
					<?php } else{ ?>
						<button type="submit" name="subs_feature_add" class="btn btn-primary btn-block mb-2"> + Add New </button>
					<?php } ?> 
				 </div>
			  </div>
			</form>
			
			<?php if( $this->session->flashdata('success') ){ ?>
				<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
			<?php } ?>
			<?php if( $this->session->flashdata('error') ){ ?>
				<div class="alert alert-denger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
			<?php } ?>
			
			<?php if( $this->logedin_user->usertype == 'superadmin' ){ ?>
				<div class="row">
					<?php
						foreach( $subs_packages as $sp_k => $sp_v ){ ?>
						<div class="col">
							<div class="card">
								<div class="card-header with-border wow bounceInLeft">
									<h4 class="card-title card-box"><?=$sp_v->spk_title?></h4>
								</div>
								<ul id="all_questions" class=" list-group list-group-flush">
								<?php 
									$sl = 1;
									foreach( $subs_features as $sf_k => $sf_v ){ 
										if( $sf_v->pac_slug == $sp_v->spk_slug ){ ?>
											
											<li class="list-group-item" data-qid="">
												<b><?=$sl?> ) </b> 
												<?=$sf_v->sf_title?>
												<br>
												<span class="float-right">
												<a href="<?=base_url('dashboard/page/subscription_features/'. $sf_v->id )?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-fw fa-lg fa-edit"></i></a> 
												<button class="toremove_feature btn btn-outline-secondary btn-sm" data-id="<?=$sf_v->id?>" ><i class="fa fa-fw fa-lg fa-close"></i></button></span>
											</li>
									<?php	$sl++; } ?>
								<?php } ?> 
								</ul>
						</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php // $this->load->view('dashboard/rev-question-list'); ?>
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
    </section>

  </div>
  <!-- /.content-wrapper -->
	
<?php $this->load->view('dashboard/footer'); ?>

			