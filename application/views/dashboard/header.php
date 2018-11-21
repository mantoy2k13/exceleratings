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
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/dashboard/custom/style.css">

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
									Chart.defaults.global.defaultFontColor = '#fff';
									var myChart = new Chart(getDiv2show, {
										 type: 'bar',
										 data: {
											  labels: gdLabels,
											  datasets: [{
													label: '-',
													 tooltips: {
													backgroundColor: '#227799'
														 },
													data: gdData,
													backgroundColor: gdBgcolor,
													borderColor: gdBgBorderColor, 
													borderWidth: 2
											  }]
										 },
										 options: {
											  scales: {
												  xAxes: [{gridLines: { color: "#fff" }}],
													yAxes: [{
														gridLines: { color: "#fff" },
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
                    
						  <li class="<?=$menuitem4 == 'rev_questions' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/rev_questions'); ?>"><i class="fa fa-question-circle"></i><i class="fa fa-wrench"></i> <span> Question Settings</span></a></li>
						  <li class="<?=$menuitem4 == 'rev_question_add' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/rev_question_add'); ?>"><i class="fa fa-question-circle"></i><i class="fa fa-plus"></i> <span> Add Question</span></a></li>
						  <li class="<?=$menuitem4 == 'notification_contacts' ? 'active':''?>"><a href="<?php echo base_url('dashboard/settings/notification_contacts'); ?>"><i class="fa fa-bell"></i><i class="fa fa-users"></i> <span>Notification contacts</span></a></li>
                    <li class="menu-title"> --- </li><!-- /.menu-title -->
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
                    <a class="navbar-brand" href="<?php echo base_url('/')?>"><strong><i>Exceleratings</i></strong></a>
                    <a class="navbar-brand hidden" href="<?php echo base_url('/'); ?>assets/dashboard/./">EX</a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 

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