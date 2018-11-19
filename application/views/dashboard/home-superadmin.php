<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

            <!-- Widgets  -->
            <div class="row">
                <div class="col-md-5">
                    <div class="card wow bounceIn">
                        <div class="card-body jackInTheBox">
										
                            <div class="row text-center">
                                <div class="container-fluid">
											<h4>Total average rating (All time)</h4>
											  <h1 class="border" style="font-size: 45px;font-weight: bold;"><?php echo round($overall_avr_rating,1); ?><small>%</small>
												<br>
												<?php 
													echo $this->General_model->rating_star($overall_avr_rating);
																								?>
												</h1>
												<hr>
												<hr>
												<h3>
													<small>Total number of reviews </small>
													<span class="border"> &nbsp; <strong class="count"><?=$total_rating_item?></strong> &nbsp; </span>
												</h3>
												<hr>
												<hr>
												
												<h4>Review activity (<b>Last 30 days</b>)</h4>
												<h1 class="border border-dark" style="font-size: 40px;font-weight: bold;">
													<?php echo round($this->General_model->get_overall_avr_rating(date('Y-m-d', strtotime('-1 months'))), 1); ?>
													<small>%</small><br>
													<?php 
														echo $this->General_model->rating_star(round($this->General_model->get_overall_avr_rating(date('Y-m-d', strtotime('-1 months'))), 1));
													?>
												</h1>
                                </div>
                            </div>
									 <br>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card wow bounceIn">
                        <div class="card-body jackInTheBox">
                            <canvas id="myChart" width="400" height="300" style="background: #fff;"></canvas>
                        </div>
                    </div>
                </div>

            </div> 
            <!-- Widgets End -->

		<div class="row">
			<div class="col-lg-10">
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
                  <th>Average Rating</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td>Loading .... </td>
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
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('dashboard/footer'); ?>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["1 Star", "2 Star", "3 Star", "4 Star", "5 Star", "6 Star", "7 Star", "8 Star", "9 Star", "10 Star"],
        datasets: [{
            label: '-',
				 tooltips: {
            backgroundColor: '#227799'
                },
            data: <?php echo json_encode($total_rating_item4chart );?>,
            backgroundColor: [
                'rgba(129,188,101, 0.3)', 
                'rgba(129,188,122, 0.3)', 
                'rgba(129,188,133, 0.3)', 
                'rgba(129,188,144, 0.3)', 
                'rgba(129,188,155, 0.3)', 
                'rgba(129,188,166, 0.3)', 
                'rgba(129,188,177, 0.3)', 
                'rgba(129,188,188, 0.3)',
                'rgba(129,188,199, 0.3)', 
                'rgba(129,188,200, 0.3)' 
            ],
            borderColor: [
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)',
                'rgba(129,188,200, 0.8)'
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
</script>