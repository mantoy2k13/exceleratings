<?php $this->load->view('auth/header'); ?>

  <div class="content pb-0">
	  <!-- /.login-logo -->
	  <div class="login-content">
		  <div class="login-form">
			  <div class="card wow flipInX">
			 
				  <div class="card-body">
					 <h4 class="login-box-msg"><strong>Sign In</strong> to start your session</h4>
						<?php 
							if( isset($_SESSION['success']) ){
								echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
							} 
							if( isset($_SESSION['error']) ){
								echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
							} 
						?>
						<?php echo validation_errors('<p class="text-red"><b>', '</b></p>'); ?>
					 <form action="" method="post">
						<div class="form-group has-feedback">
						  <input type="text" name="username" class="form-control" placeholder="UserName">
						  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
						  <input type="password" name="password" class="form-control" placeholder="Password">
						  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<hr>
						<button type="submit" name="login" class="btn btn-danger btn_xlrting btn-block btn-flat">Sign In / Login</button>
					 </form>
						<hr>
					 <a href="<?php echo base_url('auth/registration'); ?>"><b>To Registration</b></a>
				  </div>
			  </div>
			  <!-- /.login-box-body -->
				<center class="container-fluid"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('/'); ?>assets/dashboard/images/logo.png" /></a></center>
				<br>
		  </div>
	  </div>
  </div>
<?php $this->load->view('auth/footer'); ?>
