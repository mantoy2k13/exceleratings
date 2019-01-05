
<!-- Footer Top -->
<section class="footer footer-top">
    <div class="container">
        <div class="row">
            <!-- Contact Details  -->
            <div class="col-md-4">
                <div class="contact-info">
                    <h3>Reach Us</h3>
                    <ul class="contact-list">
                        <li><i class="icon-directions"></i>
                            <?php

                            echo $config['site_name'] . '<br>';

                            $add = explode(',', $config['contact_address']);
                            echo $add[0] . '<br>';
                            echo $add[1] . $add[2] . '<br>';
                            echo $add[3];

                            ?>
                        </li>
                        <li><i class="icon-call-in"></i> + <?=$config['contact_number']?></li>
                        <li><i class="icon-envelope-open"></i><a href="mailto:<?=$config['contact_email']?>"><?=$config['contact_email']?></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Contact Details  -->
            <!-- Quick Links -->
            <div class="col-md-4">
                <h3>Quick Links</h3>
                <ul class="quick-links">
                    <li><a href="#banner">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <!-- End Quick links -->
            <!-- Social Links -->
            <div class="col-sm-4">
                <h3>Stay in Touch!</h3>
                <p>Follow us on our social networks!</p>
                <ul class="social">

                    <?php
                    if($config['facebook_link']){
                        ?>
                        <li class="facebook"> <a href="<?=$config['facebook_link']?>"> <i class="fa fa-facebook"></i> </a> </li>
                        <?php
                    }
                    if($config['googleplus_link']){
                        ?>
                        <li class="google-plus"> <a href="<?=$config['googleplus_link']?>"> <i class="fa fa-google-plus"></i> </a> </li>
                        <?php
                    }

                    if($config['linkedin_link']){
                        ?>
                        <li class="linkedin"> <a href="<?=$config['linkedin_link']?>"> <i class="fa fa-linkedin"></i> </a> </li>
                        <?php
                    }

                    if($config['youtube_link']){
                        ?>
                        <li class="youtube"> <a href="<?=$config['youtube_link']?>"> <i class="fa fa-youtube-play"></i> </a> </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!--End Social Links  -->
        </div>
    </div>
</section>
<!-- End Footer Top -->

<!-- Footer Bottom -->
<footer class="footer footer-sub">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <p><?=$config['copyright_text']?></p>
            </div>
            <div class="col-lg-6 col-sm-6">
                <p class="copyright">Developed by <a href="http://sms.tbldevelopmentfirm.com/">TBLtechnerds</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Bottom -->

<!-- Start Js Files -->
<script type="text/javascript" src="<?php echo BASE_URL;?>static/frontend/js/jquery-2.1.0.min.js"></script><!--jQuery is a Javascript library that greatly reduces the amount of code that you must write.-->
<script src="<?php echo BASE_URL;?>static/frontend/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
<script src="<?php echo BASE_URL;?>static/frontend/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
<script src="<?php echo BASE_URL;?>static/frontend/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
<script src="<?php echo BASE_URL;?>static/frontend/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
<!-- End Js Files  -->

</body>

</html>