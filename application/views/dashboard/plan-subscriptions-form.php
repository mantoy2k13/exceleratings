<?php $this->load->view('dashboard/header'); ?>
<script src="https://js.braintreegateway.com/web/dropin/1.11.0/js/dropin.min.js"></script>
<?php

//	To Payment ####################################
// Initiate the Braintree
$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '5288gkfmzrh7bzyp',
    'publicKey' => '37r7jyjnqn7hv4tg',
    'privateKey' => 'c41d6f73d3797f59b8e138ad0fe2a8df'
]);

// get the client token
$clientToken = $gateway->clientToken()->generate();

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
		
		<?php $this->load->view('dashboard/plan-subscriptions-form-in'); ?>

		  <div style="clear:both;"></div>
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('dashboard/footer'); ?>