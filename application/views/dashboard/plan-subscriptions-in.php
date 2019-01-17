
		<div class="row">

			<div class="col-xs-12 col-md-4">
				<div class="panel panel-bronze  wow flipInX">
					<div class="panel-heading">
						<h3 class="panel-title">
						<i class="fa fa-bookmark"></i> Bronze Plan</h3>
					</div>
					<div class="panel-body">
						<div class="the-price">
							<h1> $250<span class="subscript">.00</span></h1>
							<small>*with 1 year contract</small><br><br>
							<div class="text-center">Set Up Fee: <b>$250.00</b></div>
							<div class="text-center">Service Fee: <b>$150.00 <small>/ month</small> </b></div>  
						</div>
						<table class="table">
							<?php
								if( $subs_features ){
									foreach( $subs_features as $sf ){ 
										if( $sf->pac_slug == 'bronze' ){ ?>
										<tr>
											<td>
												√ <?=$sf->sf_title?>
											</td>
										</tr>
							<?php		}
									}
								}
							?>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=bronze')?>" class="col-lg-12 btn btn-orange" role="button">Subscribe</a>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-4">
				<div class="panel panel-silver wow flipInX">
					<div class="panel-heading">
						<h3 class="panel-title">
						<i class="fa fa-bookmark"></i> Silver Plan</h3>
					</div>
					<div class="panel-body">
						<div class="the-price">
							<h1> $350<span class="subscript">.00</span></h1>
							<small>*with 1 year contract</small><br><br>
							<div class="text-center">Set Up Fee (incudes Tablet): <b>$350.00</b></div>
							<div class="text-center">Service Fee: <b>$250.00 <small>/ month</small> </b></div>  
						</div>
						<table class="table">
							<?php
								if( $subs_features ){
									foreach( $subs_features as $sf ){ 
										if( $sf->pac_slug == 'silver' ){ ?>
										<tr>
											<td>
												√ <?=$sf->sf_title?>
											</td>
										</tr>
							<?php		}
									}
								}
							?>
						</table>
					</div>
					<div class="panel-footer">
						<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=silver')?>" class="col-lg-12 btn btn-orange" role="button">Subscribe</a>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-4">
				<div class="panel panel-gold wow flipInX">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-bookmark"></i> Gold Plan</h3>
					</div>
					<div class="panel-body">
						<div class="the-price">
							<h1> $550<span class="subscript">.00</span></h1>
							<small>*with 1 year contract</small><br><br>
							<div class="text-center">Set Up Fee: <b>$550.00</b></div>
							<div class="text-center">Service Fee: <b>$250.00 <small>/ month</small> </b></div>  
						</div>
						<table class="table">
							<?php
								if( $subs_features ){
									foreach( $subs_features as $sf ){ 
										if( $sf->pac_slug == 'gold' ){ ?>
										<tr>
											<td>
												√ <?=$sf->sf_title?>
											</td>
										</tr>
							<?php		}
									}
								}
							?>

						</table>
					</div>
					<div class="panel-footer">
						<a href="<?=base_url('dashboard/page/plan_subscription_form?plan=gold')?>" class="col-lg-12 btn btn-orange" role="button">Subscribe</a>
					</div>
				</div>
			</div>
				
		</div>