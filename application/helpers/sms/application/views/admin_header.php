<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Material Design Icons  -->
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/css/material-design-iconic-font.css" rel="stylesheet">

    <!-- Roboto Web Font -->
<!--    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">-->

    <!-- Simplebar.js -->
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/vendor/simplebar.css" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/assets/css/multi-select.css">
    <link type="text/css" href="<?php echo BASE_URL;?>static/admin/assets/css/style.min.css" rel="stylesheet">

    <!-- morris.js Charts CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/examples/css/morris.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/examples/css/sweetalert.min.css">
    <!-- jQuery -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>static/admin/examples/css/datatables.min.css">
    <script src="<?php echo BASE_URL;?>static/admin/assets/vendor/jquery.min.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/assets/vendor/sweetalert.min.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/assets/js/jquery.multi-select.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/assets/js/quick-search.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/examples/js/masked-input.js"></script>
    <script src="<?php echo BASE_URL;?>static/admin/common.js"></script>
    <script>
$(function() {
  $('.form-group').on('keydown', '#new_number', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})
    </script>

</head>

<body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">

<!-- Navbar -->
<nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top ls-left-sidebar">

    <!-- Sidebar toggle -->
    <button class="navbar-toggler pull-xs-left hidden-lg-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft">
        <i class="devs devs-menu"></i>
    </button>

    <!-- Brand -->
    <a class="navbar-brand first-child-lg" href="/admin/dashboard">Dashboard</a>

    <!-- Search -->
<!--    <form class="form-inline pull-xs-left hidden-sm-down">-->
<!--        <div class="input-group">-->
<!--            <input type="text" class="form-control" placeholder="Search for...">-->
<!--            <span class="input-group-btn"><button class="btn" type="button"><i class="material-icons">search</i></button></span>-->
<!--        </div>-->
<!--    </form>-->
    <!-- // END Search -->

    <!-- Menu -->
    <ul class="nav navbar-nav pull-xs-right hidden-md-down">

        <!-- User dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
                <img src="<?php echo $config['current_user']['user_pic'] ? BASE_URL . $config['upload_dir'] . $config['current_user']['user_pic'] : BASE_URL . $config['upload_dir'] . 'default_user.png';?>" alt="Avatar" class="img-circle" width="40">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
                <a class="dropdown-item" href="/profile/update_user/<?=$config['current_user']['pk_user_id']?>"><i class="devs devs-edit"></i> <span class="icon-text">Edit Account</span></a>
                <a class="dropdown-item" href="/admin/logout">Logout</a>
            </div>
        </li>
        <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->

</nav>
<!-- // END Navbar -->

<!-- Sidebar -->
<div class="sidebar sidebar-left sidebar-size-3 sidebar-visible-md-up sidebar-dark bg-primary" id="sidebarLeft" data-scrollable>

    <!-- Brand -->
    <a href="/admin/dashboard" class="sidebar-brand sidebar-brand-border sidebar-brand-bg m-b-0">
        <i class="devs devs-email-open"></i> TBL SMS
    </a>

    <!-- User -->
    <a href="#" class="sidebar-link sidebar-user m-b-0">
        <img src="<?php echo $config['current_user']['user_pic'] ? BASE_URL . $config['upload_dir'] . $config['current_user']['user_pic'] : BASE_URL . $config['upload_dir'] . 'default_user.png';?>" alt="user" class="img-circle"> <?=$config['current_user']['user_name']?>
    </a>
    <!-- // END User -->

    <!-- Menu -->
    <ul class="sidebar-menu sm-bordered sm-active-button-bg" data-toggle="sidebar-collapse">

        <?=enque_admin_menu()?>
    </ul>
    <!-- // END Menu -->

</div>
<!-- // END Sidebar -->
