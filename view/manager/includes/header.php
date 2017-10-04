<?php
date_default_timezone_set('Asia/Dhaka');
$datetime=strtotime(date("Y/m/d"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
	<!-- Base path -->
	<base href="http://localhost/BITM/bitm-final-project/"/>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="assets/use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="assets/file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
	
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Your  </span><strong> Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                        <a rel="nofollow" href="#" class="dropdown-item">
                            <div class="notification">
                              <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                              <div class="notification-time"><small>4 minutes ago</small></div>
                            </div>
                        </a>
                    </li>
<!--
<!--                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>-->
                  </ul>
                </li>

<!--
                <!-- Logout    -->
                <li class="nav-item"><a href="view/manager/login.php?action=managerlogout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="assets/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Welcome <?php echo \App\Session::get('managername')?></h1>
              <p>Manager</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
            <li class="active"> <a href="view/manager/index.php"><i class="icon-home"></i>Home</a></li>
            <li class="active"> <a href="view/manager/view/admin/manager/staff/view.php"><i class="fa fa-users" aria-hidden="true"></i>Personnel details</a></li>
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Add </a>
              <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="view/manager/view/admin/manager/staff/create.php">Add new staff information</a></li>
                <li><a href="view/manager/view/admin/manager/resident/AddResidents.php">Add new residents information</a></li>
                <li><a href="view/manager/view/admin/manager/resident/payment.php">Add residents payment</a></li>
              </ul>
            </li>
         
            <li> <a href="view/manager/view/admin/manager/expenditure/view.php"> <i class="fa fa-book" aria-hidden="true"></i>Expenditure </a></li>
              <li> <a href="view/manager/view/admin/manager/query/view.php"> <i class="fa fa-inbox" aria-hidden="true"></i></i>Residents query</a></li>
			  <li> <a href="view/manager/view/admin/manager/sendmessage/create.php"> <i class="fa fa-comments-o" aria-hidden="true"></i>Send Message</a></li>
			   
          <!--  <li> <a href="assets/charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            <li> <a href="assets/forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li> <a href="assets/login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>
          </ul>-->
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
