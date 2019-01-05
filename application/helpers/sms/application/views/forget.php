<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login / Signup</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Material Design Icons  -->
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/css/material-design-iconic-font.css" rel="stylesheet">

    <!-- Roboto Web Font -->
    <!--    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">-->

    <!-- Simplebar.js -->
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/vendor/simplebar.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/css/style.min.css" rel="stylesheet">

    <!-- morris.js Charts CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/examples/css/morris.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/examples/css/sweetalert.min.css">
    <!-- jQuery -->
    <script src="<?php echo BASE_URL;?>static/admin/assets/vendor/jquery.min.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/assets/vendor/sweetalert.min.js"></script>

</head>

<body class="login">

<?php

if($notify){
    ?>
    <script type="text/javascript">

        swal({
                title: "<?=ucfirst($notify['status'])?>",
                text: "<?=$notify['msg']?>",
                type: "<?=$notify['status']?>",
                html: true,
                closeOnConfirm: true
            },
            function(){
                window.location.href = '/login';
            });

    </script>
    <?php
}
?>

<div class="row">
    <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
        <h2 class="text-primary center m-a-2">
            <img src="<?php echo BASE_URL;?>static/frontend/img/logo.png">
            <br>
            <span class="icon-text">TBL - SMS System</span>
        </h2>
        <div class="card-group">
            <div class="card bg-transparent">
                <div class="card-block">
                    <div class="center">
                        <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
                        <p class="text-muted">Access your account</p>
                    </div>
                    <form action="login/forget" method="post">

                        <div class="form-group">
                            <input id="user_email" type="email" name="user_email" class="form-control" placeholder="Type your email" required>
                            <a href="/login" class="pull-xs-right">
                                <small>Back to login</small>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="center">
                            <button type="submit" name="do_login" class="btn  btn-primary-outline btn-circle-large">
                                <i class="devs devs-mail-send"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-block center">

                    <h4 class="m-b-0">
                        <span class="text-primary">- OR - </span><br>
                        <i class="devs devs-account-add"></i> <span class="icon-text">Sign Up</span>
                    </h4>
                    <p class="text-muted">Create a new account</p>
                    <form action="/profile/regUser" method="post">
                        <div class="form-group">
                            <input name="user_name" id="user_name" type="text" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <input name="user_password" id="user_password" type="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name" required>
                        </div>

                        <div class="form-group">
                            <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name" required>
                        </div>

                        <div class="form-group">
                            <input name="company" id="company" type="text" class="form-control" placeholder="Company (Optional)">
                        </div>

                        <div class="form-group">
                            <select name="country_list" id="country_list" class="form-control">
                                <option value="41">Canada (+1)</option>
                                <option value="227" selected>United States (+1)</option>
                                <option value="228">Afghanistan (+93)</option>
                                <option value="229">Albania (+355)</option>
                                <option value="230">Algeria (+213)</option>
                                <option value="231">American Samoa (+1684)</option>
                                <option value="232">Andorra (+376)</option>
                                <option value="233">Angola (+244)</option>
                                <option value="234">Anguilla (+1264)</option>
                                <option value="235">Antarctica (+672)</option>
                                <option value="236">Antigua and Barbuda (+1268)</option>
                                <option value="237">Argentina (+54)</option>
                                <option value="238">Armenia (+374)</option>
                                <option value="239">Aruba (+297)</option>
                                <option value="240">Australia (+61)</option>
                                <option value="241">Austria (+43)</option>
                                <option value="242">Azerbaijan (+994)</option>
                                <option value="243">Bahamas (+1242)</option>
                                <option value="244">Bahrain (+973)</option>
                                <option value="245">Bangladesh (+880)</option>
                                <option value="246">Barbados (+1246)</option>
                                <option value="247">Belarus (+375)</option>
                                <option value="248">Belgium (+32)</option>
                                <option value="249">Belize (+501)</option>
                                <option value="250">Benin (+229)</option>
                                <option value="251">Bermuda (+1441)</option>
                                <option value="252">Bhutan (+975)</option>
                                <option value="253">Bolivia (+591)</option>
                                <option value="254">Bosnia and Herzegovina (+387)</option>
                                <option value="255">Botswana (+267)</option>
                                <option value="256">Brazil (+55)</option>
                                <option value="257">British Indian Ocean Territory (+0)</option>
                                <option value="258">British Virgin Islands (+1284)</option>
                                <option value="259">Brunei (+673)</option>
                                <option value="260">Bulgaria (+359)</option>
                                <option value="261">Burkina Faso (+226)</option>
                                <option value="262">Burma (Myanmar) (+95)</option>
                                <option value="263">Burundi (+257)</option>
                                <option value="264">Cambodia (+855)</option>
                                <option value="265">Cameroon (+237)</option>
                                <option value="266">Cape Verde (+238)</option>
                                <option value="267">Cayman Islands (+1345)</option>
                                <option value="268">Central African Republic (+236)</option>
                                <option value="269">Chad (+235)</option>
                                <option value="270">Chile (+56)</option>
                                <option value="271">China (+86)</option>
                                <option value="272">Christmas Island (+61)</option>
                                <option value="273">Cocos (Keeling) Islands (+61)</option>
                                <option value="274">Colombia (+57)</option>
                                <option value="275">Comoros (+269)</option>
                                <option value="276">Cook Islands (+682)</option>
                                <option value="277">Costa Rica (+506)</option>
                                <option value="278">Croatia (+385)</option>
                                <option value="279">Cuba (+53)</option>
                                <option value="280">Cyprus (+357)</option>
                                <option value="281">Czech Republic (+420)</option>
                                <option value="282">Democratic Republic of the Congo
                                    (+243)</option>
                                <option value="283">Denmark (+45)</option>
                                <option value="284">Djibouti (+253)</option>
                                <option value="285">Dominica (+1767)</option>
                                <option value="286">Dominican Republic
                                    (+1809)</option>
                                <option value="287">Ecuador (+593)</option>
                                <option value="288">Egypt (+20)</option>
                                <option value="289">El Salvador (+503)</option>
                                <option value="290">Equatorial Guinea (+240)</option>
                                <option value="291">Eritrea (+291)</option>
                                <option value="292">Estonia (+372)</option>
                                <option value="293">Ethiopia (+251)</option>
                                <option value="294">Falkland Islands (+500)</option>
                                <option value="295">Faroe Islands (+298)</option>
                                <option value="296">Fiji (+679)</option>
                                <option value="297">Finland (+358)</option>
                                <option value="298">France (+33)</option>
                                <option value="299">French Polynesia (+689)</option>
                                <option value="300">Gabon (+241)</option>
                                <option value="301">Gambia (+220)</option>
                                <option value="302">Georgia (+995)</option>
                                <option value="303">Germany (+49)</option>
                                <option value="304">Ghana (+233)</option>
                                <option value="305">Gibraltar (+350)</option>
                                <option value="306">Greece (+30)</option>
                                <option value="307">Greenland (+299)</option>
                                <option value="308">Grenada (+1473)</option>
                                <option value="309">Guam (+1671)</option>
                                <option value="310">Guatemala (+502)</option>
                                <option value="311">Guinea (+224)</option>
                                <option value="312">Guinea-Bissau (+245)</option>
                                <option value="313">Guyana (+592)</option>
                                <option value="314">Haiti (+509)</option>
                                <option value="315">Holy See (Vatican City) (+39)</option>
                                <option value="316">Honduras (+504)</option>
                                <option value="317">Hong Kong (+852)</option>
                                <option value="318">Hungary (+36)</option>
                                <option value="319">Iceland (+354)</option>
                                <option value="320">India (+91)</option>
                                <option value="321">Indonesia (+62)</option>
                                <option value="322">Iran (+98)</option>
                                <option value="323">Iraq (+964)</option>
                                <option value="324">Ireland (+353)</option>
                                <option value="325">Isle of Man (+44)</option>
                                <option value="326">Israel (+972)</option>
                                <option value="327">Italy (+39)</option>
                                <option value="328">Ivory Coast (+225)</option>
                                <option value="329">Jamaica (+1876)</option>
                                <option value="330">Japan (+81)</option>
                                <option value="331">Jersey (+44)</option>
                                <option value="332">Jordan (+962)</option>
                                <option value="333">Kazakhstan (+7)</option>
                                <option value="334">Kenya (+254)</option>
                                <option value="335">Kiribati (+686)</option>
                                <option value="336">Kosovo (+381)</option>
                                <option value="337">Kuwait (+965)</option>
                                <option value="338">Kyrgyzstan (+996)</option>
                                <option value="339">Laos (+856)</option>
                                <option value="340">Latvia (+371)</option>
                                <option value="341">Lebanon (+961)</option>
                                <option value="342">Lesotho (+266)</option>
                                <option value="343">Liberia (+231)</option>
                                <option value="344">Libya (+218)</option>
                                <option value="345">Liechtenstein (+423)</option>
                                <option value="346">Lithuania (+370)</option>
                                <option value="347">Luxembourg (+352)</option>
                                <option value="348">Macau (+853)</option>
                                <option value="349">Macedonia (+389)</option>
                                <option value="350">Madagascar (+261)</option>
                                <option value="351">Malawi (+265)</option>
                                <option value="352">Malaysia (+60)</option>
                                <option value="353">Maldives (+960)</option>
                                <option value="354">Mali (+223)</option>
                                <option value="355">Malta (+356)</option>
                                <option value="356">Marshall Islands (+692)</option>
                                <option value="357">Mauritania (+222)</option>
                                <option value="358">Mauritius (+230)</option>
                                <option value="359">Mayotte (+262)</option>
                                <option value="360">Mexico (+52)</option>
                                <option value="361">Micronesia (+691)</option>
                                <option value="362">Moldova (+373)</option>
                                <option value="363">Monaco (+377)</option>
                                <option value="364">Mongolia (+976)</option>
                                <option value="365">Montenegro (+382)</option>
                                <option value="366">Montserrat (+1664)</option>
                                <option value="367">Morocco (+212)</option>
                                <option value="368">Mozambique (+258)</option>
                                <option value="369">Namibia (+264)</option>
                                <option value="370">Nauru (+674)</option>
                                <option value="371">Nepal (+977)</option>
                                <option value="372">Netherlands (+31)</option>
                                <option value="373">Netherlands Antilles (+599)</option>
                                <option value="374">New Caledonia (+687)</option>
                                <option value="375">New Zealand (+64)</option>
                                <option value="376">Nicaragua (+505)</option>
                                <option value="377">Niger (+227)</option>
                                <option value="378">Nigeria (+234)</option>
                                <option value="379">Niue (+683)</option>
                                <option value="380">North Korea (+850)</option>
                                <option value="381">Northern Mariana Islands (+1670)</option>
                                <option value="382">Norway (+47)</option>
                                <option value="383">Oman (+968)</option>
                                <option value="384">Pakistan (+92)</option>
                                <option value="385">Palau (+680)</option>
                                <option value="386">Panama (+507)</option>
                                <option value="387">Papua New Guinea (+675)</option>
                                <option value="388">Paraguay (+595)</option>
                                <option value="389">Peru (+51)</option>
                                <option value="390">Philippines (+63)</option>
                                <option value="391">Pitcairn Islands (+870)</option>
                                <option value="392">Poland (+48)</option>
                                <option value="393">Portugal (+351)</option>
                                <option value="394">Puerto Rico (+1)</option>
                                <option value="395">Qatar (+974)</option>
                                <option value="396">Republic of the Congo (+242)</option>
                                <option value="397">Romania (+40)</option>
                                <option value="398">Russia (+7)</option>
                                <option value="399">Rwanda (+250)</option>
                                <option value="400">Saint Barthelemy (+590)</option>
                                <option value="401">Saint Helena (+290)</option>
                                <option value="402">Saint Kitts and Nevis (+1869)</option>
                                <option value="403">Saint Lucia (+1758)</option>
                                <option value="404">Saint Martin (+1599)</option>
                                <option value="405">Saint Pierre and Miquelon (+508)</option>
                                <option value="406">Saint Vincent and the Grenadines (+1784)</option>
                                <option value="407">Samoa (+685)</option>
                                <option value="408">San Marino (+378)</option>
                                <option value="409">Sao Tome and Principe (+239)</option>
                                <option value="410">Saudi Arabia (+966)</option>
                                <option value="411">Senegal (+221)</option>
                                <option value="412">Serbia (+381)</option>
                                <option value="413">Seychelles (+248)</option>
                                <option value="414">Sierra Leone (+232)</option>
                                <option value="415">Singapore (+65)</option>
                                <option value="416">Slovakia (+421)</option>
                                <option value="417">Slovenia (+386)</option>
                                <option value="418">Solomon Islands (+677)</option>
                                <option value="419">Somalia (+252)</option>
                                <option value="420">South Africa (+27)</option>
                                <option value="421">South Korea (+82)</option>
                                <option value="422">Spain (+34)</option>
                                <option value="423">Sri Lanka (+94)</option>
                                <option value="424">Sudan (+249)</option>
                                <option value="425">Suriname (+597)</option>
                                <option value="426">Swaziland (+268)</option>
                                <option value="427">Sweden (+46)</option>
                                <option value="428">Switzerland (+41)</option>
                                <option value="429">Syria (+963)</option>
                                <option value="430">Taiwan (+886)</option>
                                <option value="431">Tajikistan (+992)</option>
                                <option value="432">Tanzania (+255)</option>
                                <option value="433">Thailand (+66)</option>
                                <option value="434">Timor-Leste (+670)</option>
                                <option value="435">Togo (+228)</option>
                                <option value="436">Tokelau (+690)</option>
                                <option value="437">Tonga (+676)</option>
                                <option value="438">Trinidad and Tobago (+1868)</option>
                                <option value="439">Tunisia (+216)</option>
                                <option value="440">Turkey (+90)</option>
                                <option value="441">Turkmenistan (+993)</option>
                                <option value="442">Turks and Caicos Islands (+1649)</option>
                                <option value="443">Tuvalu (+688)</option>
                                <option value="444">Uganda (+256)</option>
                                <option value="445">Ukraine (+380)</option>
                                <option value="446">United Arab Emirates (+971)</option>
                                <option value="447">United Kingdom (+44)</option>
                                <option value="448">Uruguay (+598)</option>
                                <option value="449">US Virgin Islands (+1340)</option>
                                <option value="450">Uzbekistan (+998)</option>
                                <option value="451">Vanuatu (+678)</option>
                                <option value="452">Venezuela (+58)</option>
                                <option value="453">Vietnam (+84)</option>
                                <option value="454">Wallis and Futuna (+681)</option>
                                <option value="455">Yemen (+967)</option>
                                <option value="456">Zambia (+260)</option>
                                <option value="457">Zimbabwe (+263)</option>
                                <option value="458">Cura&#231;ao (+599)</option>
                                <option value="459">Dominican Republic
                                    (+1829)</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input name="user_email" id="user_email" type="text" class="form-control" placeholder="E-mail Address" required>
                        </div>

                        <div class="form-group">
                            <input name="user_phone" id="user_phone" type="text" class="form-control" placeholder="Phone or Mobile" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-rounded">Register</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/tether.min.js"></script>
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/bootstrap.min.js"></script>

<!-- Simplebar.js -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/simplebar.min.js"></script>

<!-- Bootstrap Layout -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/bootstrap-layout.js"></script>

<!-- Bootstrap Layout Scrollable Extension JS -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/bootstrap-layout-scrollable.js"></script>

<!-- Theme Colors -->
<script src="<?php echo BASE_URL;?>static/admin/assets/js/colors.js"></script>

<!-- morris.js Charts -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/raphael.min.js"></script>
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/morris.min.js"></script>

<!-- Chart.js -->
<script src="<?php echo BASE_URL;?>static/admin/assets/vendor/Chart.min.js"></script>

<!-- Init -->
<script src="<?php echo BASE_URL;?>static/admin/examples/js/chart.js"></script>
<script src="<?php echo BASE_URL;?>static/admin/examples/js/chartjs.js"></script>

</body>

</html>