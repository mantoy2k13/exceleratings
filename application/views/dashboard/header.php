<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exceleratings</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('/'); ?>assets/dashboard/images/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	 

    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/flag-icon.min.css">

    <link href="<?php echo base_url('/'); ?>assets/dashboard/assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url('/'); ?>assets/dashboard/assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/style.css">
    <link href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 

    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/assets/wow/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/custom/style-2.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/custom/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/common/sweetalert/sweetalert.css">
	
	
	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
	<script>
		// Initialize Firebase
		var config = {
			apiKey: "AIzaSyD-fJuBn0DP3Ep0DSZ1pYs-vllNtVRH7dE",
			authDomain: "exceleratings.firebaseapp.com",
			databaseURL: "https://exceleratings.firebaseio.com",
			projectId: "exceleratings",
			storageBucket: "exceleratings.appspot.com",
			messagingSenderId: "411841575861"
		};
		firebase.initializeApp(config);
	</script>
	
    <script src="<?php echo base_url('/'); ?>assets/dashboard/custom/Chart.bundle.min.js"></script>
    <script>
		function chartCall(getDiv2show, graphData){
			graphData = JSON.parse(graphData);
		//	console.log(JSON.parse(graphData));
			var gdLabels = [];
			var gdData = [];
			var gdBgcolor = [];
			var gdBgBorderColor = [];
			for (var i = 0; i < graphData.length; i++){
				 var obj = graphData[i];
				 gdLabels.push(obj.title);
				 gdData.push(obj.value_number);
				 gdBgcolor.push(obj.bg_color);
				 gdBgBorderColor.push(obj.border_color);
				 /* 
				 for (var key in obj){
					  var attrName = key;
					  var attrValue = obj[key];
				 }
				  */
			}
			Chart.defaults.global.defaultFontColor = '#ED2424';
			var myChart = new Chart(getDiv2show, {
				 type: 'bar',
				 data: {
					  labels: gdLabels,
					  datasets: [{
							label: [' '],
							 tooltips: {
									backgroundColor: 'red'
								 },
							data: gdData,
							backgroundColor: gdBgcolor,
							borderColor: gdBgBorderColor, 
							borderWidth: 2
					  }]
				 },
				 options: {
					  scales: {
						  xAxes: [{gridLines: { color: "#ddd" }}],
							yAxes: [{
								gridLines: { color: "#ddd" },
								 ticks: {
									  beginAtZero:true
								 }
							}]
					  }
				 }
			});
		}
	 </script>

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
        }
		  #flotPie1 .legendLabel{
			color: #fff;
			}
			#flotPie1 .legendColorBox > div{
				border: 1px solid #fff !important;
			}
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
    </style>

	<script type="text/javascript">
		var base_url = '<?php echo base_url('/'); ?>';
	</script>
</head>
<body>

	<!-- Left Panel --> 
	<aside id="left-panel" class="left-panel">
	  <nav class="navbar navbar-expand-sm navbar-default"> 
			<div id="main-menu" class="main-menu collapse navbar-collapse">
				 <ul class="nav navbar-nav">
					<li class="<?=$menuitem4 == 'home' ? 'active':''?>">
						<a href="<?php echo base_url('dashboard/page'); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard Home</a>
					</li>
					<li class="menu-title"> --- </li><!-- /.menu-title -->
					<?php if( $this->logedin_user->usertype == 'superadmin' ){ ?>
					<li class="<?=$menuitem4 == 'service_categories' ? 'active':''?>"><a href="<?php echo base_url('dashboard/superadmin/service_categories'); ?>"><i class="menu-icon fa fa-list-ul"></i> <span> Service Categories</span></a></li>
					<?php } ?>
					<li class="<?=$menuitem4 == 'rev_questions' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/rev_questions'); ?>"><i class="menu-icon fa fa-wrench"></i> <span> Question Settings</span></a></li>
					<li class="<?=$menuitem4 == 'rev_question_add' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/rev_question_add'); ?>"><i class="menu-icon fa fa-plus"></i> <span> Add Question</span></a></li>
					<li class="<?=$menuitem4 == 'question_pages' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/question_pages'); ?>"><i class="menu-icon fa fa-file-text"></i> <span> Question's Page</span></a></li>
					<li class="<?=$menuitem4 == 'notification_contacts' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/notification_contacts'); ?>"><i class="menu-icon fa fa-users"></i> <span>Notification contacts</span></a></li>
					<?php if( $this->logedin_user->usertype != 'superadmin' ){ ?>
					<li class="<?=$menuitem4 == 'plan_subscription' ? 'active':''?>"><a href="<?php echo base_url('dashboard/page/plan_subscription'); ?>"><i class="menu-icon fa fa-bars"></i> <span>Plan Subscription</span></a></li>
					<?php } ?>
					<li class="menu-title"> --- </li><!-- /.menu-title -->
					<li class="<?=$menuitem4 == 'profile' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/profile'); ?>"><i class="menu-icon fa fa-user"></i> <span>Profile</span></a></li>
					<li class="<?=$menuitem4 == 'settings' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings'); ?>"><i class="menu-icon fa fa-wrench"></i> <span>General Settings</span></a></li>
					<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="menu-icon fa fa-sign-out"></i> <span>LogOut</span></a></li>
				 </ul>
			</div><!-- /.navbar-collapse -->
	  </nav>
	</aside><!-- /#left-panel --> 
	<!-- Left Panel -->

    <!-- Right Panel --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="<?php echo base_url('/')?>"><img src="<?php echo base_url('assets/front/'); ?>assets/img/logo-sm.png" alt="logo" /></a>
                    <a class="navbar-brand hidden" href="<?php echo base_url('/'); ?>assets/dashboard/./">EX</a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 

                    <div class="header-left">
                       
                        <div class="dropdown for-notification">
									<?php 
										if( $this->logedin_user->usertype == 'superadmin' ){ ?>
											<span class="badge badge-info">Super Admin</span>
									<?php	}elseif( $this->logedin_user->usertype == 'generaladmin' ){ ?>
											<span class="badge badge-dark">General Admin</span>
									<?php	}elseif( $this->logedin_user->usertype == 'generaluser' ){ ?>
											<span class="badge badge-light">General User</span>
									<?php	} ?>
                            <span class="badge badge-info userinfo_label">
                                <?php echo $this->session->userdata('logedin_user')->username; ?>
                            </span>
                            <span class="badge badge-info userinfo_label">
                                <?php echo $this->logedin_user->email; ?>
                            </span>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="<?php echo base_url('/')?>accessories/#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="<?php echo base_url('/')?>accessories/#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="<?php echo base_url('/')?>accessories/#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="user-area dropdown float-right">
                        <a href="<?php echo base_url('/'); ?>assets/dashboard/#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('/'); ?>assets/dashboard/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('/')?>auth/logout"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div> 
                </div>  
            </div>
      
		 </header><!-- /header -->
        <!-- Header-->