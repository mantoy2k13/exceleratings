<?php $this->load->view('front/header-pg');?>


      <div class="main">
        <section class="module review"> 
				<div class="container" style="min-height:  450px;">
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">
							<h2 class="module-title font-alt">Review page</h2>
						  <ul class="list-group list-group-flush">
							 <?php 
								if( !$pgs ){ ?>

									
										<h4>Review page not ready!</h4><hr>
									<li class="list-group-item">
										<a href="<?=base_url('dashboard/settings/question_pages')?>" class="btn btn-info btn-block">
											<h4>Please create your review page </h4>
										</a>
									</li>
								<?php 
								}
								foreach( $pgs as $pg_k => $pg_v ){
									$trClass = ($pg_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
								?>
								<a href="<?=base_url('front/review/'.$pg_v->id)?>">
								<li class="list-group-item">
									<h4><?=($pg_k+1) . '. ' . $pg_v->pg_title?> <small><i>[<?=$pg_v->id?>]</i></small></h4>
								</li>
								</a>
								<?php } ?>
							</ul>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</div>
        </section>
<?php $this->load->view('front/footer-pg');?>