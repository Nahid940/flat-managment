<?php
include_once '../../vendor/autoload.php';


\App\Session::init();
\App\Session::checkSession();
$flat=new \App\flats\Flat();
$manager=new \App\manager\Manager();
$managerCostList=new \App\manager\ManagerCostList();
$staff=new \App\staff\Staff();
$staffPayment=new \App\staffPayment\StaffPayment();
$residentPaymeny=new \App\flatrentPayment\ResidentPayment();

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
<!--                                    <div class="progress">-->
<!--                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>-->
<!--                                    </div>-->
                                </div>
                                <div class="number"><strong><?php echo $flat->totalFlat()?></strong></div>

                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <div class="title"><span>Total booked flat</span>
<!--                                    <div class="progress">-->
<!--                                        <div role="progressbar" style="width: ; height: 4px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>-->
<!--                                    </div>-->
                                </div>
                                <div class="number"><strong><?php echo $flat->totalBookedFlat();?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="icon-bill"></i></div>
                                <div class="title"><span>Total manager</span>
<!--                                    <div class="progress">-->
<!--                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>-->
<!--                                    </div>-->
                                </div>
                                <div class="number"><strong><?php echo $manager->getTotalManager()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-orange"><i class="icon-check"></i></div>
                                <div class="title"><span>Total<br>staff</span>
<!--                                    <div class="progress">-->
<!--                                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>-->
<!--                                    </div>-->
                                </div>
                                <div class="number"><strong><?php echo $staff->getTotallStaff()?></strong></div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dashboard-header">
                <div class="container-fluid">
                    <div class="row bg-white ">
                        <div class="col-lg-12">
                            <?php  $rss=$staffPayment->StaffTotalPaymentLastMonth();

                            $res1=$manager->getManagerMonthlySalaryCost();

                            $res2=($managerCostList->costListOfLastMonth());
                            ?>

                            <div class="row">
                                <div class="col-lg-4">
                                    <strong>Staff salary cost of last month</strong>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #D9EDF7">
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $rss['month']?></td>
                                            <td><?php echo $rss['year']?></td>
                                            <td style="color: red"><?php echo $rss['Total']?></td>
                                        </tr>

                                        </thead>
                                    </table>
                                </div>

                                <div class="col-lg-4">
                                    <strong>Manager salary cost of last month</strong>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #D9EDF7">
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $res1['month']?></td>
                                            <td><?php echo $res1['year']?></td>
                                            <td style="color: red"><?php echo $res1['Total']?></td>
                                        </tr>

                                        </thead>
                                    </table>
                                </div>

                                <div class="col-lg-4">
                                    <strong>Total maintenance cost of last month</strong>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr style="background-color: #D9EDF7">
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $res2['month']?></td>
                                            <td><?php echo $res2['year']?></td>
                                            <td style="color: red;"><?php echo $res2['Total']?></td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <?php
                                    $totalcost=$rss['Total']+$res2['Total']+$res1['Total'];
                                    \App\Session::set('totalcost',$totalcost);
                                ?>

                            </div>


                        </div>
                    </div>
                </div>
            </section>


    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-green"><i class="fa fa-calendar-o"></i> </div>
                                <div class="text">

                                    <small style="color: red"> Total cost of last month</small><br><strong style="color: red"><?php echo $rss['Total']+$res2['Total']+$res1['Total']?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                                <div class="text"><small style="color: red">Total resident payment of last month</small><br><strong style="color: red"><?php echo $residentPaymeny->getTotalPayment()?></strong></div>
                            </div>
                        </div>

<!--                        <div class="col-lg-4">-->
<!--                            <div class="statistic d-flex align-items-center bg-white has-shadow">-->
<!--                                <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>-->
<!--                                <div class="text"><small>Total resident payment of last month</small><br><strong style="color: red">--><?php //echo $residentPaymeny->getTotalPayment()?><!--</strong></div>-->
<!--                            </div>-->
<!--                        </div>-->
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
                                <div class="title"><strong class="text-violet">Monthly maintenance cost</strong></div>
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