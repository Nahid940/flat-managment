<?php
date_default_timezone_set('Asia/Dhaka');
$datetime=strtotime(date("Y/m/d"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My villa</title>
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

<!--    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	
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
                <!-- Navbar Brand --><a href="view/admin/index.php" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Owner's </span><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <!-- Notifications-->
                <li class="nav-item dropdown">
                    <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-red" id="newquery"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                        <a rel="nofollow" href="view/admin/view/admin/owner/query/Message.php" class="dropdown-item">
                            <div class="notification">
                              <div class="notification-content">
                                  <i class="fa fa-envelope bg-green"></i>
                              </div>
                            </div>
                        </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item"><a href="view/admin/login.php?action=logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
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
            <div class="avatar"><img src="<?php echo \App\Session::get('Ownerimage')?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Welcome <?php echo \App\Session::get('ownername')?></h1>
              <p>Owner</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
            <li class="active"> <a href="view/admin/index.php"><i class="icon-home"></i>Home</a></li>
            <li class="active"> <a href="view/admin/view/admin/owner/manager/view.php"><i class="fa fa-users" aria-hidden="true"></i>Personnel details</a></li>
            <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Add new information</a>
              <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="view/admin/view/admin/owner/manager/AddInfo.php">Add new manager</a></li>
                  <li><a href="view/admin/view/admin/owner/manager/salary.php">Add manager salary info</a></li>
              </ul>
            </li>
         
            <li> <a href="view/admin/view/admin/owner/expenditure/expenditure.php"> <i class="fa fa-book" aria-hidden="true"></i>Expenditure </a></li>
              <li> <a href="view/admin/view/admin/owner/query/Message.php"> <i class="fa fa-inbox" aria-hidden="true"></i>Residents query</a></li>
              <li> <a href="view/admin/view/admin/owner/notice/create.php"> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>Post notice</a></li>
              <li> <a href="view/admin/view/admin/owner/message/Message.php"> <i class="fa fa-paper-plane-o" aria-hidden="true"></i>Send message</a></li>
              <li> <a href="view/admin/view/admin/owner/profile/profile.php"> <i class="fa fa-user-o" aria-hidden="true"></i> View your profile</a></li>
              <li> <a href="view/admin/view/admin/owner/trash/trash.php"> <i class="fa fa-trash" aria-hidden="true"></i> Trash</a></li>
<!--			  <li> <a href="view/admin/view/admin/owner/sendmessage/create.php"> <i class="fa fa-comments-o" aria-hidden="true"></i>Send Message</a></li>-->
			   

        </nav>
        <div class="content-inner">
          <!-- Page Header-->

          <!-- Dashboard Counts Section-->
