<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$manager=new \App\manager\Manager();
$res=$manager->getEachManagerMonthlySalaryList(\App\Session::get('manager_id'));
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

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Your monthly salary payment list</h3>
                        </div>
                        <!--                            <div class="card-body">-->
                        <table class="table table-bordered" id="EachManagerSalaryList">
                            <thead>

                            <tr>
                                <td colspan="9" style="color:#3a0000"><strong>Total paid till now : </strong></td>
                            </tr>
                            <tr>
                                <th>Your name Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                            </tr>
                            </thead>


                            <tbody>

                                <tr>
                                    <td><?php echo $res['name']?></td>
                                    <td><?php echo $res['month']?></td>
                                    <td><?php echo $res['date']?></td>
                                    <td><?php echo $res['year']?></td>
                                    <td style="color: #490000;font-weight: bold"><?php echo $res['amount']?></td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </section>

<?php include_once('../../../../includes/footer.php'); ?>