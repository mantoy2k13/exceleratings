<?php $this->load->view('auth/header'); ?>

				  <div class="card-body">
					 <h4 class="login-box-msg"><strong>Sign Up</strong></h4>
						<?php 
							if( isset($_SESSION['success']) ){
								echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
							} 
							if( isset($_SESSION['error']) ){
								echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
							} 
						?>
						<?php echo validation_errors('<p class="text-danger"><b> !> ', '</b></p>'); ?>
					 <form action="" method="post">
						<div class="form-group has-feedback">
						  <input type="text" name="username" class="form-control" placeholder="User name" value="<?=$this->input->post('username')?>">
						  <span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
						  <input type="email" name="email" value="<?=$this->input->post('email')?>" class="form-control" placeholder="Email">
						  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						  <div class="form-group">
							 <label for="post_title">Services Type</label>
							 <?php // pre($service_categories); ?>
							 <select name="service_category" class="form-control">
								<option> -- Select -- </option>
							<?php
								foreach( $service_categories as $sc_k => $sc_v ){ ?> 
								<option value="<?=$sc_v->id?>" <?php if( $this->input->post('service_category') == $sc_v->id ){ echo 'selected'; } ?>><?=$sc_v->title?></option> 
							<?php } ?> 
							 </select>
						  </div>
						<div class="form-group has-feedback">
						  <input type="password" name="password" class="form-control" placeholder="Password">
						  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
						  <input type="password" name="conf_password" class="form-control" placeholder="Retype password">
						  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						</div>
						<hr>
						<button type="submit" name="submitForm" value="register" class="btn btn-danger btn_xlrting btn-block btn-flat">Sign Up / Registration</button>
					 </form>
						<hr>
					 <h4 class="text-left"><a href="<?php echo base_url('auth/login'); ?>"><b>To Login</b></a></h4>
				  </div>
<?php $this->load->view('auth/footer'); ?>


