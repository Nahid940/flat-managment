<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$managerCostList=new \App\manager\ManagerCostList();
$staffPayment=new App\staffPayment\StaffPayment();
$resPayment=new \App\flatrentPayment\ResidentPayment();

include_once('../../../../includes/header.php');

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
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Resident payment list</h3>
                        </div>

                        <div class="card-body">
                            <table class="table" id="expenditureList">

                                <thead>
                                <tr>
                                    <td colspan="9" style="color:#3a0000"><strong>Total cost : <?php echo $managerCostList->TotalCost()?></strong></td>
                                </tr>
                                    <tr>
                                        <th>Resident name</th>
                                        <th>Date</th>
                                        <th>Phone no.</th>
                                        <th>Flat No.</th>
                                        <th>Flat rent</th>
                                        <th>Electrician bill</th>
                                        <th>Other cost</th>
                                        <th>Total</th>
                                        <th>Print document</th>
                                    </tr>
                                </thead>


                                <tbody>

                                <?php


                                foreach ($resPayment->getPaymentListMonthly() as $totalData){
                                    $datetime=strtotime($totalData['date']);
                                    $month=date('F',$datetime);


                                    ?>
                                    <tr>
                                        <td><?php echo $totalData['name']?></td>
                                        <td><?php echo $totalData['date']?></td>
                                        <td><?php echo $totalData['phn']?></td>
                                        <td><?php echo $totalData['flat_no']?></td>
                                        <td><?php echo $totalData['flat_rent']?></td>
                                        <td><?php echo $totalData['electricity_bill']?></td>
                                        <td><?php echo $totalData['other_bill']?></td>
                                        <td><?php echo $totalData['total']?></td>
                                        <td>
                                            <form action="view/manager/view/admin/manager/resPaymentList/print.php" method="post">
                                                <button class="btn btn-warning" type="submit">Print</button>
                                            </form>
                                        </td>

                                    </tr>

                                <?php }?>


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </section>


<?php include_once('../../../../includes/footer.php'); ?>