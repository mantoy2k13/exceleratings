<?php $this->load->view('front/header-pg');?>
	  <section class="module" style="padding-top:35px;">
		 <div class="container">
			<div class="row multi-columns-row form-custom">
                <div class="col-md-12">
                    
                <div class="col-sm-6 col-sm-offset-3 align-center">
                <div class="container-fluid wow flip">
                    <a href="<?php echo base_url('/'); ?>">
                        <img class="img-custom" src="<?php echo base_url('/'); ?>assets/dashboard/images/logo.png" />
                    </a>
                </div>
                </div>
                </div>
                <div class="col-sm-12">
                    <div class="price-table font-alt">
                        <h4>Sign In</h4>
                        <div class="borderline"></div>
                            Sign In to start your session
                        <hr>
                        <ul class="price-details text-left" >
                            <li>
                                <form role="form" method="post" action="">
                                    <?php if( isset($_SESSION['success']) ){ ?>
                                        <div class="alert-custom alert-success">
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                            <strong>Success!</strong> <?php echo $_SESSION['success']; ?>
                                        </div>
                                    <?php } ?>

                                    <?php if( isset($_SESSION['error']) ){ ?>
                                        <div class="alert-custom alert-custom-danger">
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                            <strong>Oops!</strong> <?php echo $_SESSION['error']; ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" placeholder="Your Name*" required="required">
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password*" required="required">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-block btn-round btn-d" name="login" type="submit">Sign In</button>
                                        
                                    </div>
                                    <div class="text-center link-custom">
                                        <a href="<?php echo base_url('auth/registration'); ?>">Click here to regiter</a>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
			</div>
			<div class="row mt-40">
                <div class="col-sm-6 col-sm-offset-3 align-center">
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                </div>
			</div>
		 </div>
	  </section>
<?php $this->load->view('front/footer-pg');?>
