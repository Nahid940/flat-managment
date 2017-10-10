<?php
include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$residentPayment=new \App\flatrentPayment\ResidentPayment();

include_once('../includes/header.php');

?>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Expenditure</li>
        </div>
    </ul>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Maintenance cost list</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" id="ResidentexpenditureList">

                                <thead>
                                <tr>
                                    <td colspan="9" style="color:#3a0000"><strong>Total cost : <?php ?></strong></td>
                                </tr>
                                <tr>

                                    <th>Flat no</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Flat rent</th>
                                    <th>Electricity bill</th>
                                    <th>Other bill</th>
                                    <th>Total</th>
                                </tr>
                                </thead>


                                <tbody>

                                <?php

                                foreach ($residentPayment->getPaymentListMonthlyOFparticularResident(\App\Session::get('resident_id')) as $totalData){
                                    ?>
                                    <tr>
                                        <td><?php echo $totalData['flat_no']?></td>
                                        <td><?php echo $totalData['month']?></td>
                                        <td><?php echo $totalData['year']?></td>
                                        <td><?php echo $totalData['flat_rent']?></td>
                                        <td><?php echo $totalData['electricity_bill']?></td>
                                        <td><?php echo $totalData['other_bill']?></td>
                                        <td><?php echo $totalData['total']?></td>
                                    </tr>

                                <?php }?>


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>

<?php include_once('../includes/footer.php'); ?>