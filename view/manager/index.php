<?php

include_once '../../vendor/autoload.php';
\App\Session::init();
\App\Session::checkSession();
$flat=new \App\flats\Flat();
$resident=new App\resident\residents();

include_once('includes/header.php');

?>
          <!-- Dashboard Header Section    -->

            <section class="dashboard-counts no-padding-bottom">
                <div class="container-fluid">
                    <div class="row bg-white has-shadow">
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="icon-user"></i></div>
                                <div class="title"><span>Total flat</span>

                                </div>
                                <div class="number"><strong><?php echo $flat->totalFlat()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="icon-padnote"></i></div>
                                <div class="title"><span>Total booked flat</span>

                                </div>
                                <div class="number"><strong><?php echo $flat->totalBookedFlat()?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-6">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="icon-bill"></i></div>
                                <div class="title"><span>Total<br>family member</span>

                                </div>
                                <div class="number"><strong><?php echo $resident->totalMember()?></strong></div>
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