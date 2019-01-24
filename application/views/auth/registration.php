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
                        <h4>Sign Up</h4>
                        <div class="borderline"></div>
                            To register, please fill up all forms below.
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
                                    <?php if(validation_errors()){?>
                                        <div class="alert-custom alert-custom-danger">
                                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                            <strong>Oops!</strong><?php echo validation_errors(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" placeholder="Your UserName*" required="required" value="<?=$this->input->post('username')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" value="<?=$this->input->post('email')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="service_category">Services Type</label>
                                        <select name="service_category" class="form-control">
                                            <option value=""> -- Select -- </option>
                                            <?php
                                                foreach( $service_categories as $sc_k => $sc_v ){ ?> 
                                                <option value="<?=$sc_v->id?>" <?php if( $this->input->post('service_category') == $sc_v->id ){ echo 'selected'; } ?>><?=$sc_v->title?></option> 
                                            <?php } ?> 
                                        </select>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password*" required="required" value="<?=$this->input->post('password')?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input class="form-control" type="password" id="conf_password" name="conf_password" placeholder="Confirm Password*" required="required">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-block btn-round btn-d" name="submitForm" value="register" type="submit">Sign Up</button>
                                        
                                    </div>
                                    <div class="text-center link-custom">
                                        <a href="<?php echo base_url('auth/login'); ?>">Click here to login</a>
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
