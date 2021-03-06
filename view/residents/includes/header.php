<?php

//include_once '../../../vendor/autoload.php';
//\App\Session::init();

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
                <!-- Navbar Brand --><a href="view/residents/index.php" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Your  </span><strong> Dashboard</strong></div>
                      <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                <!-- Toggle Button-->
<!--                  <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>-->
              </div>

              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                <!-- Notifications-->
                <li class="nav-item dropdown">
                    <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" title="Owner's message">
                        <i class="fa fa-envelope"></i>
                        <span class="badge bg-red" id="newMessage"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                        <a rel="nofollow" href="view/residents/query/view.php" class="dropdown-item">
                            <div class="notification">
                                <div class="message-content">
                                    <i class="fa fa-envelope bg-green"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                  </ul>
                </li>


                  <li class="nav-item dropdown">
                      <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" title="Manager's message">
                          <i class="fa fa-commenting-o" aria-hidden="true"></i>
                          <span class="badge bg-red" id="newMnrgMessage"></span></a>
                      <ul aria-labelledby="notifications" class="dropdown-menu">
                          <li>
                              <a rel="nofollow" href="view/residents/query/view.php" class="dropdown-item">
                                  <div class="notification">
                                      <div class="message-content-mrg">
                                          <i class="fa fa-envelope bg-green"></i>
                                      </div>
                                  </div>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item dropdown">
                      <a id="" data-target="#" href="view/residents/notice/view.php"  aria-haspopup="true" aria-expanded="false" class="nav-link" title="New notice">
                          <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                          <span class="badge bg-red" id="newNotice" </span></a>
                  </li>

                <!-- Logout    -->
<!--                  view/admin/login.php?action=logout-->

                <li class="nav-item"><a href="view/residents/login.php?action=logout" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>

              </ul>

            </div>
          </div>
        </nav>
      </header>

      <div class="page-content d-flex">

        <!-- Side Navbar -->

          <nav class="side-navbar">
<!--              Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">
                  <div class="avatar"><img src="<?php echo \App\Session::get('image')?>" alt="" class="img-fluid rounded-circle"></div>
                  <div class="title">
                      <h1 class="h4">Welcome <?php echo \App\Session::get('name')?></h1>
                      <p>Resident</p>
                  </div>
              </div>
              <ul class="list-unstyled">
                  <li class="active"> <a href="view/residents/index.php"><i class="icon-home"></i>Home</a></li>

                  <li> <a href="view/residents/profile/profile.php"> <i class="fa fa-address-card" aria-hidden="true"></i> Your prifile </a></li>
                  <li> <a href="view/residents/expense/expenditure.php"> <i class="fa fa-list-alt" aria-hidden="true"></i> Your expenditure list</a></li>
                  <li> <a href="view/residents/query/query.php"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Inform your problem</a></li>
                  <li> <a href="view/residents/query/view.php"> <i class="fa fa-inbox" aria-hidden="true"></i>All messages</a></li>
                  <li> <a href="view/residents/notice/view.php"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Notice </a> </li>

              </ul>
          </nav>

        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><span style="color: #002e59;"> Welcome to My villa!!</span></h2>
            </div>
          </header>

            <?php
            if(isset($_GET['action']) && $_GET['action']=='logout'){
                \App\Session::Destroy();
            }
            ?>




          <!-- Dashboard Counts Section-->
