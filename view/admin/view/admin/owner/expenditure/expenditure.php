<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$manager=new \App\manager\Manager();
include_once('../../../../includes/header.php');
$managerCostList=new \App\manager\ManagerCostList();
$staffPayment=new \App\staffPayment\StaffPayment();
$managerSlaray=new \App\manager\Manager();


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
                            <table class="table table-bordered" id="expenditureList">

                                <thead>
                                <tr>
                                    <td colspan="9" style="color:#3a0000"><strong>Total cost : <?php echo $managerCostList->TotalCost()?></strong></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Plumber Cost</th>
                                    <th>Electrician bill</th>
                                    <th>Tool cost</th>
                                    <th>Carpenter cost</th>
                                    <th>Masonry cost</th>
                                    <th>Other cost</th>
                                    <th>Total</th>
                                </tr>
                                </thead>


                                <tbody>

                                <?php


                                foreach ($managerCostList->getAllExpenditureList() as $totalData){
                                    $datetime=strtotime($totalData['date']);
                                    $month=date('F',$datetime);


                                    ?>
                                    <tr>
                                        <td><?php echo $totalData['date']?></td>
                                        <td><?php echo $month?></td>
                                        <td><?php echo $totalData['plumber_cost']?></td>
                                        <td><?php echo $totalData['electrician_bill']?></td>
                                        <td><?php echo $totalData['tool_cost']?></td>
                                        <td><?php echo $totalData['carpenter_cost']?></td>
                                        <td><?php echo $totalData['masonry_cost']?></td>
                                        <td><?php echo $totalData['others_cost']?></td>
                                        <td style="color: #490000;font-weight: bold"><?php echo $totalData['Total']?></td>

                                    </tr>

                                <?php }?>


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Manager monthly salary list</h3>
                        </div>
                        <!--                            <div class="card-body">-->
                        <table class="table table-bordered" id="ManagerSalaryList">
                            <thead>

                            <tr>
                                <td colspan="9" style="color:#3a0000"><strong>Total paid till now : <?php echo$res= $managerSlaray->TotalmanagerSalaryPayemnt()?></strong></td>
                            </tr>
                            <tr>
                                <th>Staff Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                            </tr>
                            </thead>


                            <tbody>



                            <?php


                            foreach ($manager->getManagerMonthlySalaryList() as $totalDataList){
                                ?>
                                <tr>
                                    <td><?php echo $totalDataList['name']?></td>
                                    <td><?php echo $totalDataList['month']?></td>
                                    <td><?php echo $totalDataList['date']?></td>
                                    <td><?php echo $totalDataList['year']?></td>
                                    <td style="color: #490000;font-weight: bold"><?php echo $totalDataList['amount']?></td>
                                </tr>

                            <?php }?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Staff monthly salary list</h3>
                        </div>
                        <!--                            <div class="card-body">-->
                        <table class="table table-bordered" id="SatffSalaryList">
                            <thead>

                            <tr>
                                <td colspan="9" style="color:#3a0000"><strong>Total paid till now : <?php echo $staffPayment->TotalPayment()?></strong></td>
                            </tr>
                            <tr>
                                <th>Staff Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                            </tr>
                            </thead>


                            <tbody>



                            <?php


                            foreach ($staffPayment->StaffPaymentList() as $totalDataList){
                                ?>
                                <tr>
                                    <td><?php echo $totalDataList['name']?></td>
                                    <td><?php echo $totalDataList['month']?></td>
                                    <td><?php echo $totalDataList['date']?></td>
                                    <td><?php echo $totalDataList['year']?></td>
                                    <td style="color: #490000;font-weight: bold"><?php echo $totalDataList['amount']?></td>
                                </tr>

                            <?php }?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php include_once('../../../../includes/footer.php'); ?>