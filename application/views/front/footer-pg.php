
        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; Copyright text, <small>Developed by <a href="https://tbltechnerds.com">TBL Development Firm (www.tbltechnerds.com)</a></small></p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/wow/dist/wow.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/smoothscroll.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url('assets/common/'); ?>rateit/jquery.rateit.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>assets/js/main.js"></script>
	<script type="text/javascript">
		$('.rateit').bind('rated', function() { 
			$('input', this).val( $(this).rateit('value') ); 
		});
		
		function getAllRevNumber(){
			var rev;
			$( ".rev_input" ).each(function( index ) {
			  rev + $( this ).val();
			});
			return rev;
		}
		
		$( document ).ready(function() {
			
			var rev = 0;
			var totalRevItem = 0;
			var revItem = 0;
			var ratingPercentage = 0;
			$('.rev_input').on('change', function(){
			//	console.log( $(this).closest('form').serializeArray() );
			//	/* 
				$( ".rev_input" ).each(function( index, e ) {
				//	console.log( $( this ).attr('type') );
				//  console.log( $(this).prop('checked') );
					if( $( this ).attr('type') == 'range' ){
						
						if( $( this ).val() > 0 ){
							
							rev = rev*1 + $( this ).val() *1;
							revItem = revItem + 1;
						}
					}
					
					if( $( this ).attr('type') == 'radio' ){
						
						if( $(this).prop('checked') ){
						//	console.log($(this).prop('checked'));
							rev = rev + $( this ).val() *1;
							revItem = revItem + 1;
						}
					}
					
					totalRevItem = index;
				});
				
				console.log('rev: ' + rev);
				console.log('revItem: ' + revItem);
				console.log('totalRevItem: ' + totalRevItem);
				ratingPercentage = (rev / revItem) * 10;
				
				ratingPercentage = ratingPercentage.toFixed(1);
				ratingPercentage = parseFloat(ratingPercentage);
				if( ratingPercentage > 0 ){
					$('#nav_rev_count_show').show();
				}else{
					$('#nav_rev_count_show').hide();
				}
				$('.total_rev_plus').val(ratingPercentage + '%');
				console.log('===');
				rev = 0;
				revItem = 0;
			//	 */
			});
			
		});
	</script>
  </body>
</html>
