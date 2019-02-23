<?php $this->load->view('dashboard/header'); ?>

<?php $this->load->view('front/firebase-update'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      
      <h3 class="card-title box-title">Users </h3>
      <div class="row">
         <div class="container-fluid">
            <!-- Default box -->
            
            <div class="card wow bounceInLeft">

               <div class="card-body">
                  <table id="all_users_tbl" data-uid="" class="display table table-bordered table-hover table-striped datatable  col_1_center col_3_center col_1ast_center ">
                        <thead>
                           <tr>
                              <th>SL.</th>
                              <th>The User</th>
                              <th>Subs. Plan</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td></td>
                              <td colspan="2">Loading ... <span class="loading_spinning"><b> --- </b></span> </td>
                              <td> </td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>SL.</th>
                              <th>The User</th>
                              <th>Subs. Plan</th>
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