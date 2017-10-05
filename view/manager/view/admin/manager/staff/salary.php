
<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$staff=new App\staff\Staff();
$staffPayment=new \App\staffPayment\StaffPayment();

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
                echo \App\Session::get('StaffsalaryCompeltealready');
                \App\Session::UnsetKeySession("StaffsalaryCompeltealready");
                echo \App\Session::get('StaffSalaryPayment');
                \App\Session::UnsetKeySession("StaffSalaryPayment");
                ?>

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Insert residents's monthly payment record</h3>
                    </div>
                    <br/>

                    <!--                    action="view/admin/view/admin/owner/manager/addManagerSalary.php"

                    action="view/admin/view/admin/owner/manager/

                    -->
                    <form method="post" name="addResidentSalaryform" onsubmit="return validateResidentPaymentInfoForm()"  action="view/manager/view/admin/manager/staff/staffSalaryPayment.php">

                        <div class="form-group">
                            <span id="ManagerIDValidator"></span>
                            <label for="resident_id">Select staff's name:</label>
                            <select class="form-control" name="staff_id">
                                <option value="">Select staff name</option>
                                <?php foreach ($staff->getAllStaff() as $allStaff) { ?>
                                    <option value="<?php echo $allStaff['staff_id']?>"><?php echo $allStaff['name']?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span id="ManageramountValidator"></span>
                            <label for="amount">Enter amount</label>
                            <input type="text" name="amount" class="form-control">
                        </div>


                        <div class="form-group pull-right">
                            <input type="submit" value="Insert data" id="addResidentPayment" class="btn btn-primary" >
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>



<?php include_once('../../../../includes/footer.php'); ?>
