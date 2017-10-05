
<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$staff=new App\staff\Staff();
$staffPayment=new \App\staffPayment\StaffPayment();
$managerCostList=new \App\manager\ManagerCostList();

include_once('../../../../includes/header.php');
?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Add staff salary info</h2>
    </div>

</header>

<br/>
<div class="container-fluid">
    <h2>Overview</h2>
    <div class="row">
        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                <div class="text"><strong><?php echo $staff->getTotallStaff()?></strong><br><small>Total staff</small></div>
            </div>
        </div>

        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                <div class="text"><strong><?php echo $staffPayment->completedStaffPayment()?></strong><br><small>Staff's salary given on this month.</small></div>
            </div>
        </div>
    </div>
</div>

<section class="forms">
    <div class="container-fluid">
        <?php

        ?>
        <div class="row">

            <div class="col-lg-6 offset-2">
                <?php
                echo \App\Session::get('costAdded');
                \App\Session::UnsetKeySession("costAdded");
                ?>

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Record your expenditures</h3>
                    </div>
                    <br/>

                    <form method="post" name="addResidentSalaryform" onsubmit=""  action="view/manager/view/admin/manager/cost/AddCostOperation.php">
                        <div class="form-group">
                            <label for="amount">Plumber cost</label>
                            <input type="text" name="plumber_cost" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="amount">Electrician bill</label>
                            <input type="text" name="electrician_bill" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="amount">Tools bill</label>
                            <input type="text" name="tool_cost" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">Carpenter cost</label>
                            <input type="text" name="carpenter_cost" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">Masonry cost</label>
                            <input type="text" name="masonry_cost" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="amount">Other cost</label>
                            <input type="text" name="others_cost" class="form-control">
                        </div>

                        <div class="form-group pull-right">
                            <input type="submit" value="Insert data" id="addResidentPayment" class="btn btn-primary" >
                        </div>
                    </form>

                </div>
            </div>

        </div>




        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Your expenditure list</h3>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered" id="expenditureList">
                    <thead>
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

                    <?php foreach ($managerCostList->getAllExpenditureList() as $totalData){
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
                            <td><?php echo $totalData['Total']?></td>
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
