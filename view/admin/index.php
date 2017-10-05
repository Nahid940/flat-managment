<?php
include_once '../../vendor/autoload.php';


\App\Session::init();
\App\Session::checkSession();
$flat=new \App\flats\Flat();
$manager=new \App\manager\Manager();
$staff=new \App\staff\Staff();

if(isset($_GET['action']) && $_GET['action']=='logout'){
    \App\Session::Destroy();
}

include_once('includes/header.php');
?>
          <!-- Dashboard Header Section    -->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Dashboard</h2>
        </div>
    </header>

<!--    <ul class="breadcrumb">-->
<!--        <div class="container-fluid">-->
<!--            --><?php
//            $url = "$_SERVER[REQUEST_URI]";
//            $last=explode("/",$url);
//            $lastelement=rtrim(end($last),'.php');
//            ?>
<!--            <li class="breadcrumb-item"><a href="--><?php //echo $url?><!--">Home</a></li>-->
<!--        </div>-->
<!--    </ul>-->

            <section class="dashboard-counts no-padding-bottom">
                <div class="container-fluid">
                    <div class="row bg-white has-shadow">
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                                <div class="title"><span>Total flats</span>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                    </div>
                                </div>
                                <div class="number"><strong><?php echo $flat->totalFlat()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="title"><span>Total booked flat</span>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                    </div>
                                </div>
                                <div class="number"><strong><?php echo $flat->totalBookedFlat();?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="icon-bill"></i></div>
                                <div class="title"><span>Total manager</span>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                    </div>
                                </div>
                                <div class="number"><strong><?php echo $manager->getTotalManager()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-orange"><i class="icon-check"></i></div>
                                <div class="title"><span>Open<br>Cases</span>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                                    </div>
                                </div>
                                <div class="number"><strong><?php echo $staff->getTotallStaff()?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dashboard-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="statistics col-lg-4">
                                <div class="statistic d-flex align-items-center bg-white has-shadow">
                                    <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                                    <div class="text">he;llo<strong class=""></strong><br><small></small></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="dashboard-header">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Statistics -->
                        <div class="chart col-lg-12 col-12">

                            <!-- Bar Chart   -->
                            <div class="bar-chart has-shadow bg-white">
                                <div class="title"><strong class="text-violet">Monthly expenditure</strong></div>
                                <canvas id="barChartHome"></canvas>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                                <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



          <!-- Projects Section-->
          <section class="projects no-padding-top">
            <div class="container-fluid">
              <!-- Project-->
              
            </div>
          </section>
          <!-- Client Section-->
          <section class="client no-padding-top">
            <div class="container-fluid">
              <div class="row">
              </div>
            </div>
          </section>
          <!-- Feeds Section-->

          <section class="feeds no-padding-top">
            <div class="container-fluid">
              <div class="row">
                <!-- Trending Articles-->
                <!-- Check List -->
              </div>
            </div>
          </section>



          <!-- Page Footer-->
     <?php include_once('includes/footer.php');

     ?>