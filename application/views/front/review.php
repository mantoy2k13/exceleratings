<?php $this->load->view('front/header-pg');?>


      <div class="main">
        <section class="module bg-dark-60 contact-page-header bg-dark" data-background="<?php echo base_url('assets/front/'); ?>assets/img/contact.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Review</h2>
				<div class="module-subtitle font-serif">Your feedback is a VITAL TOOL used to ensure that we are providing the BEST SERVICE possible!</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module review">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
			  <div class="in_center">
				<div class="in_center_content">
				  <h4>Answering a few short questions, enables us to better serve you.</h4>
				  <h5>CLICK INSIDE THE CIRCLE TO THE RIGHT THAT BEST ANSWERS EACH QUESTION</h5>
				  <div class="img_container_center"> 
					<img src="<?php echo base_url('assets/front/'); ?>assets/img/review.png" alt="review" />
				  </div>
				  <div class="questions"> 
					<p><span class="rado_2" ><strong> Please rate your exceleratings experience:</strong></span> <span class="rado_1" ><span >10</span><span >9</span><span >8</span><span >7</span><span >6</span><span >5</span><span >4</span><span>3</span><span>2</span><span >1</span></span> </p>
					<ul class="list-group">
					<?php 
						foreach($ques as $q_k => $q_v){ ?>
							
							<li class="list-group-item">
								<span class="rado_2" ><?php echo $q_k *1 +1; ?>.	<?php echo $q_v->question; ?></span> 
								<span class="rado_1" >

								<select id="example">
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								</select>
								</span> 
							</li>
						
					<?php	} ?>
					</ul>
					
					<p><span class="rado_2" >11. Do you have additional comments or concerns?</span></p>
					<p><input class="add_coment" type="text" /></p>
					<h5 class="last_title" >We apologize that your experience did not meet your expectations.</h5>
					<h5>We Would like to learn how we can improve our service.</h5>
					
					<p class="deff_ask" ><span class="rado_2" > Do you know about our "Intelidata" extended analytics services?</span> <span class="rado_1" >
					Yes <input type="radio" value="2"  name="q1" />No <input type="radio" value="3"  name="q1" /></span> </p>
					<div class="row padd-b10">
						<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="First Name" /></div>
						<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Last Name"  /></div>
						<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" placeholder="email"  /></div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Phone#" /></div>
						<div class="col-md-3 col-sm-12"><input class="add_coment height-s" type="text" placeholder="Street Address" /></div>
						<div class="col-md-6 col-sm-12"><input class="add_coment height-s" type="text" placeholder="City, State, Zip" /></div>
					</div>
					<h4 class="thank_title" ><strong>Thank you!</strong> Please click "SUBMIT" below to confirm your answers!</h4>
					<p class="review_submittion" >Submit</p>
				  
				</div>
			  </div>
				
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-d">
<?php $this->load->view('front/footer-pg');?>