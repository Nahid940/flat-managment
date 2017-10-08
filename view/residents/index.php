<?php

//include_once '../../vendor/autoload.php';
//\App\Session::init();
//var_dump(\App\Session::get('managername'));
//var_dump(\App\Session::get('login'));
//\App\Session::checkSession();


include_once '../../vendor/autoload.php';
\App\Session::init();
\App\Session::checkSession();
$residentPayment=new \App\flatrentPayment\ResidentPayment();
$resident=new App\resident\residents();


include_once('includes/header.php');



?>
    <!-- Dashboard Header Section    -->

    <section class="dashboard-counts no-padding-bottom">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if((date("d"))==25){
                        echo "<div class='alert alert-info'>Please pay your monthly bill within this month!!</div>";
                    }
                        echo $residentPayment->PaymentComplete();
                    ?>
                </div>
            </div>
            <div class="row bg-white has-shadow">

                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        <div class="title">Total  <span style="color: #013277;font-weight: bold" class="number"><?php echo $resident->getParticularResidentInfo(\App\Session::get('resident_id'))?> </span> months your are living here
                        </div>

                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="icon-padnote"></i></div>
                        <div class="title">
                            Total flat rent you have paid till now <span style="color: #013277;font-weight: bold" class="number"><?php echo $residentPayment->getTotalPaymentOfEachResident(\App\Session::get('resident_id'))?> </span>
                        </div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-green"><i class="icon-bill"></i></div>
                        <div class="title">
                            Total expenditure till now <span style="color: #013277;font-weight: bold" class="number"><?php echo $residentPayment->getTotalExpenditureEachResident(\App\Session::get('resident_id'))?> </span>
                        </div>
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