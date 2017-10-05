
<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$resident=new App\resident\residents();
$residentPaymentTotal=new \App\flatrentPayment\ResidentPayment();

include_once('../../../../includes/header.php');
?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Add resident payment info</h2>
    </div>

</header>


<br/>
<div class="container-fluid">
    <h2>Overview</h2>
    <div class="row">
        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                <div class="text"><strong><?php echo $resident->selectTotalResident()?></strong><br><small>Total residents</small></div>
            </div>
        </div>

        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                <div class="text"><strong><?php echo $residentPaymentTotal->totalPaymentForThisMonth()?></strong><br><small>Total payment for this month</small></div>
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
                echo \App\Session::get('resPaymentCOmplete');
                \App\Session::UnsetKeySession("resPaymentCOmplete");
                echo \App\Session::get('paymentCompeltealready');
                \App\Session::UnsetKeySession("paymentCompeltealready");
                ?>

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Insert residents's monthly payment record</h3>
                    </div>
                    <br/>
                    <form method="post" name="addResidentSalaryform" onsubmit="return validateResidentPaymentInfoForm()"  action="view/manager/view/admin/manager/resident/BillPaymentOper.php">

                        <div class="form-group">
                            <span id="ManagerIDValidator"></span>
                            <label for="resident_id">Select resident's name:</label>
                            <select class="form-control" name="resident_id">
                                <option value="">Select name</option>
                                <?php foreach ($resident->selectAllResident() as $allResident) { ?>
                                    <option value="<?php echo $allResident['resident_id']?>"><?php echo $allResident['name']?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <span id="ManageramountValidator"></span>
                            <label for="amount">Enter flat rent amount</label>
                            <input type="text" name="flat_rent" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="amount">Enter electricity bill</label>
                            <input type="text" name="electricity_bill" class="form-control">
                        </div>

                    <div class="form-group">
                        <label for="amount">Enter other bill</label>
                        <input type="text" name="other_bill" class="form-control">
                    </div>
<!--                        <input type="hidden" value="--><?php //echo date('Y-m-d')?><!--" name="date">-->

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
