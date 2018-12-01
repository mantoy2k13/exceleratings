
          <div class="card">
            <div class="card-header">
					<a href="<?php echo base_url('dashboard/settings/rev_question_add'); ?>" class="float-right btn btn-info"><i class="fa fa-plus"></i><i class="fa fa-question-circle"></i> Add Question</a>
					<h3 class="card-title">All question list</h3> 
            </div>
            <!-- /.box-header -->
					
					<?php if( $this->session->flashdata('success') ){ ?>
						<div class="container-fluid">
							<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
						</div>
					<?php } ?>

					<ul class="list-group question_list">
					  <?php 
						foreach( $ques as $q_k => $q_v ){ 
									
						$answer_option = '';
						if( $q_v->answer_option == 'yes_no' ){
							$answer_option = 'Yes/No selection';
						}else if( $q_v->answer_option == 'rev_1_10' ){
							$answer_option = 'Review 1-10 selection';
						}
						
						$status = '<span class="badge badge-info">ACTIVE</span>';
						$inactClass = '';
						if( $q_v->status == '0' ){
							$status = 'Inactive';
							$inactClass = 'inactive';
						}
						$inactClass .= ($q_k % 2 ? ' wow bounceInLeft ' : ' wow bounceInRight ');
						
						
							$queations_ratings = $this->General_model->get_queations_ratings($q_v->qid);
						//	pre($queations_ratings);
							$queations_ratings_act = [];
							foreach( $queations_ratings as $qr ){
								// pre($qr);
								if($qr != 0){
									array_push($queations_ratings_act,$qr);
								}
							}
							$q_r_total = array_sum($queations_ratings_act);
							$q_r_count = count($queations_ratings_act);
						//	pre($q_r_total);
						//	pre($q_r_count);
							$q_r_avg = 0;
							if( $q_r_count > 0 ){
								$q_r_avg = $q_r_total / $q_r_count;
								$q_r_avg = $q_r_avg*10;
							}
						//	pre($q_r_avg);
						?>
							<li class="list-group-item <?php echo $inactClass; ?>">
								<span class="act float-right">
									<button data-qid="<?php echo  $q_v->qid; ?>" data-toggle="modal" data-target="#qusEditForm" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="">
									<i class="fa fa-fw fa-lg fa-eye"></i> / <i class="fa fa-fw fa-lg fa-edit"></i></button> &nbsp; 
									<button type="button" class="btn btn-outline-secondary btn-sm toremove" data-toggle="tooltip" data-id="<?php echo $q_v->qid; ?>">
									<i class="fa fa-fw fa-lg fa-close"></i></button>
								</span>
								<i class="fa fa-arrows fa-lg float-left qShorting" aria-hidden="true"></i> 
								<h4 class="q_qnt float-left"><span class="border border-white"><?php echo $q_k * 1 +1; ?></span><b class="qs"><?php echo $q_v->question; ?></b></h4>
								<div class="clearfix"></div>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-5" >
										 <div class="collapse collapse-in" id="tg_<?=$q_v->qid?>" style="height: 200px;"><canvas id="chart_<?=$q_v->qid?>" class="question_graph" style=""></canvas></div>
										 <button class="btn btn-sm btn-dark float-right" type="button" data-toggle="collapse" data-target="#tg_<?=$q_v->qid?>" aria-expanded="false" aria-controls="collapseExample"> View graph </button>
									</div>
									<div class="col-md-6">
										
										<?php echo $answer_option . '<span class="ans" hidden>'. $q_v->answer_option .'</span>'; ?> &nbsp; | &nbsp; <?php echo $status . '<span class="sts" hidden>'. $q_v->status .'</span>'; ?> 
										
										Average: 
										<div class="progress average_progress" style="height: 40px;font-weight: bold;font-size: 1.3em;">
										  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?=$q_r_avg?>%" aria-valuenow="<?=$q_r_avg?>" aria-valuemin="0" aria-valuemax="100"><?=round($q_r_avg,1)?>%</div>
										</div>
									</div>
								</div>
							</li>
								<?php 
									$qus_ratings_graph_data = [
										['title'=>'1 Star','value_number'=>$queations_ratings->star1 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star1*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star1*1) .', 0.8)'],
										['title'=>'2 Star','value_number'=>$queations_ratings->star2 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star2*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star2*1) .', 0.8)'],
										['title'=>'3 Star','value_number'=>$queations_ratings->star3 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star3*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star3*1) .', 0.8)'],
										['title'=>'4 Star','value_number'=>$queations_ratings->star4 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star4*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star4*1) .', 0.8)'],
										['title'=>'5 Star','value_number'=>$queations_ratings->star5 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star5*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star5*1) .', 0.8)'],
										['title'=>'6 Star','value_number'=>$queations_ratings->star6 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star6*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star6*1) .', 0.8)'],
										['title'=>'7 Star','value_number'=>$queations_ratings->star7 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star7*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star7*1) .', 0.8)'],
										['title'=>'8 Star','value_number'=>$queations_ratings->star8 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star8*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star8*1) .', 0.8)'],
										['title'=>'9 Star','value_number'=>$queations_ratings->star9 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star9*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star9*1) .', 0.8)'],
										['title'=>'10 Star','value_number'=>$queations_ratings->star10 *10,'bg_color'=>'rgba(0,255,'. (197 + $queations_ratings->star10*1) .', 0.4)','border_color'=>'rgba(0,255,'. (197 +$queations_ratings->star10*1) .', 0.8)']
									];
								//	pre(json_encode($qus_ratings_graph_data));
								//	pre($qus_ratings_graph_data);
								// echo json_encode($qus_ratings_graph_data[$q_k]);
								?>
								<script>
									
									var ctx = document.getElementById("chart_<?=$q_v->qid?>");
								//	console.log(<?=$q_k?>);
									var jsonData = '<?php echo json_encode($qus_ratings_graph_data); ?>';
								//	console.log(jsonData);
									chartCall(ctx, jsonData);
								</script>
						<?php } ?>
					</ul>
          </div>
          <!-- /.box -->


			<div class="modal fade " id="qusEditForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				 <div class="modal-content">
					<div class="modal-header">
					  <h3 class="modal-title" id="exampleModalLabel">Question edit form</h3>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
						<form action="<?php echo base_url('dashboard/settings/'); ?>rev_question_edit" method="post" enctype="multipart/form-data">
						  <div class="form-group">
							 <label for="post_title">The Question</label>
							<textarea name="question" id="question" class="form-control" rows=""><?php // echo $question->question; ?></textarea>
							<input type="hidden" name="qid"/>
						  </div>
							  <div class="row">
								  <div class="col-md-6">
									<div class="row">
									  <div class="btn" data-toggle="buttons">
											<div class="btn-group-vertical">
											  <label class="btn btn-sm btn-info" title="Anser get by Yes/No options">
												 <input type="radio" value="yes_no" name="answer_option" class="answer_option"> 
												 Answer get by Yes/No options
											  </label>
											
											  <label class="btn btn-sm btn-info" title="Answer get by 1 to 10 reviewing options">
												 <input type="radio" value="rev_1_10" name="answer_option" class="answer_option">
													Answer get by 1 to 10 reviewing options
											  </label>
											
											</div>
										</div>
									</div>
								  </div>
								  <div class="col-md-6">
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" <?php // if($advertise->status == 1 ){ echo 'checked';} ?>>
										  <label class="custom-control-label" for="status">Active</label>
										</div>
										<hr>
										<div class="form-group">
											<button type="submit" name="rev_question_update" class="btn btn-lg btn-info btn-block"> Save </button>
										</div>
								  </div>
							  </div>
							</form>
						</div>
					</div>
				 </div>
			  </div>
			</div>
			