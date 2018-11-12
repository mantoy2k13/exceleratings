<?php $this->load->view('dashboard/header'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
	
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