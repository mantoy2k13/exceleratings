<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
		<?php if( $this->session->flashdata('is_login_msg') ){ ?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Hello!</strong> <?php echo $this->session->flashdata('is_login_msg'); ?>
			</div>
		<?php } ?>
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="card wow bounceIn">
                        <div class="card-body jackInTheBox ">
                            <div class="row text-center">
                                <div class="container-fluid">
									<h4>Total average rating (All time)</h4>
										<h1 class="border" style="font-size: 45px;font-weight: bold;color: #ED2424;"><span id="totlAvgRatAllTime"><span class="loading_spinning">.</span></span><small>%</small>
										<br>
										<?php 
											echo $this->General_model->rating_star($overall_avr_rating);
										?>
										</h1>
										<hr><hr>
										<h3>
											<small>Total number of reviews </small>
											<span class="border"> &nbsp; <strong style="color: #ED2424;" id="totlNumOfRevAllTime"><span class="loading_spinning">.</span></strong> &nbsp; </span>
										</h3>
										<hr><hr>
										
										<h4>Review activity (<b>Last 30 days</b>)</h4>
										<h1 class="border border-dark" style="font-size: 40px;font-weight: bold;color: #ED2424;">
											<span id="revActLast30days"><span class="loading_spinning">.</span></span><?php // echo round($this->General_model->get_overall_avr_rating(date('Y-m-d', strtotime('-1 months'))), 1); ?><small>%</small><br>
											<?php 
												echo $this->General_model->rating_star(round($this->General_model->get_overall_avr_rating(date('Y-m-d', strtotime('-1 months'))), 1));
											?>
										</h1>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-5">
                    <div class="card wow bounceIn total_graph">
                        <div class="card-body jackInTheBox">
                            <canvas id="myChart" width="400" height="300"></canvas>
                        </div>
                    </div>
                </div>

            </div> 
            <!-- Widgets End -->

		<div class="row">
			<div class="container-fluid">
			<!-- Default box -->
			<div class="card wow bounceInLeft">

			  <div class="card-body">
				 <h3 class="card-title box-title">Dashboard Home </h3>

              <table id="totalRev" data-uid="" class="display table table-bordered table-hover table-striped datatable  col_1_center col_1ast_center col_3_center col_4_center col_5_center col_6_center">
                <thead>
                <tr>
                  <th>SL.</th>
                  <th>Review Time</th>
                  <th>Reviewer Email</th>
                  <th>Question Page</th>
                  <th>Average Rating</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td colspan="2">Loading ... <span class="loading_spinning"><b> --- </b></span> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>SL.</th>
                  <th>Review Time</th>
                  <th>Reviewer Email</th>
                  <th>Question Page</th>
                  <th>Average Rating</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
			  </div>
			  <!-- /.box-body -->
			</div>
			<!-- /.box -->
			</div>

      </div>
	
		<div class="row">
			<div class="container-fluid">
				<?php $this->load->view('dashboard/rev-question-list'); ?>
			</div>
      </div>
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>
<script>




		$(document).ready(function() {
			var ref = firebase.database().ref("<?=$this->session->userdata('logedin_user')->id?>");
		//	alert("<?=$this->session->userdata('logedin_user')->id?>");
			ref.on("value", function(snapshot) {
					$('#totlAvgRatAllTime').html(0);
					$('#totlNumOfRevAllTime').html(0);
					$('#revActLast30days').html(0);
				snapshot.forEach(function(childSnapshot) {
					//	console.log(childSnapshot.val());
					if(childSnapshot.key == 'total_average_rating_alltime'){
						$('#totlAvgRatAllTime').html(childSnapshot.val());
					//	console.log(childSnapshot.val());
					}
					
					if(childSnapshot.key === 'total_number_of_reviews'){
						//alert(childSnapshot.val());
						$('#totlNumOfRevAllTime').html( childSnapshot.val() );
					}
					
					if(childSnapshot.key === 'review_activity_last_30_days'){
						//alert(childSnapshot.val());
						$('#revActLast30days').html( childSnapshot.val() );
					}
					
					
					if(childSnapshot.key === 'total_average_rating_alltime_graph'){
						//alert(childSnapshot.val());
					//	$('#revActLast30days').html( childSnapshot.val() );
						
						

								var ctx = document.getElementById("myChart");
								Chart.defaults.global.defaultFontColor = '#ED2424';
								var myChart = new Chart(ctx, {
									 type: 'bar',
									 data: {
										  labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star", "6 Star", "7 Star", "8 Star", "9 Star", "10 Star"],
										  datasets: [{
												label: '-',
												 tooltips: {
												backgroundColor: '#227799'
													 },
												data: childSnapshot.val(),
												backgroundColor: [					 
													 'rgba(253,180,10, 0.3)', 
													 'rgba(253,160,10, 0.3)', 
													 'rgba(253,140,10, 0.3)', 
													 'rgba(253,120,10, 0.3)', 
													 'rgba(253,100,10, 0.3)', 
													 'rgba(253,080,10, 0.3)', 
													 'rgba(253,060,10, 0.3)', 
													 'rgba(253,040,10, 0.3)',
													 'rgba(253,020,10, 0.3)', 
													 'rgba(253,000,10, 0.3)' 
												],
												borderColor: [
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)',
													 'rgba(237,36,20, 0.8)'
												], 
												borderWidth: 2
										  }]
									 },
									 options: {
										  scales: {
												yAxes: [{
													 ticks: {
														  beginAtZero:true
													 }
												}]
										  }
									 }
								});
								
					}

					
				});
			});
		});




</script>