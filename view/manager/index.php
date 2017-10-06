<?php

include_once '../../vendor/autoload.php';
\App\Session::init();
\App\Session::checkSession();
$flat=new \App\flats\Flat();

include_once('includes/header.php');

?>
          <!-- Dashboard Header Section    -->

            <section class="dashboard-counts no-padding-bottom">
                <div class="container-fluid">
                    <div class="row bg-white has-shadow">
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="icon-user"></i></div>
                                <div class="title"><span>Total flat</span>

                                </div>
                                <div class="number"><strong><?php echo $flat->totalFlat()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="icon-padnote"></i></div>
                                <div class="title"><span>Total booked flat</span>

                                </div>
                                <div class="number"><strong><?php echo $flat->totalBookedFlat()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="icon-bill"></i></div>
                                <div class="title"><span>New<br>Invoices</span>

                                </div>
                                <div class="number"><strong>44</strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-orange"><i class="icon-check"></i></div>
                                <div class="title"><span>Open<br>Cases</span>

                                </div>
                                <div class="number"><strong>35</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="dashboard-header">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Statistics -->
                        <div class="statistics col-lg-4">

                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-red"><i class="fa fa-tasks"></i>
                                </div>
                                <div class="text"><strong class="Ajaxdata"></strong><br><small>New feedback</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                                <div class="text"><strong>152</strong><br><small>Interviews</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                                <div class="text"><strong>147</strong><br><small>Forwards</small></div>
                            </div>
                        </div>


                        <div class="chart col-lg-8 col-12">
                            <!-- Bar Chart   -->
                            <div class="bar-chart has-shadow bg-white">
                                <div class="title"><strong class="text-violet">95%</strong><br><small>Monthly expenditure</small></div>
                                <canvas id="barChartHome"></canvas>
                            </div>
                            <!-- Numbers-->
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