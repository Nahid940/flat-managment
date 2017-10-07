
<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$manager=new \App\manager\Manager();

include_once('../../../../includes/header.php');
?>

<header class="page-header">
    <div class="container-fluid">
        <h2 class="no-margin-bottom">Add new info</h2>
    </div>

</header>


<br/>
<div class="container-fluid">
    <h2>Overview</h2>
    <div class="row">
        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                <div class="text"><strong class="Ajaxdata"></strong><br><small>Manager</small></div>
            </div>
        </div>

        <div class="statistics col-lg-4">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                <div class="text"><strong>152</strong><br><small>Other staffs</small></div>
            </div>
        </div>
    </div>
</div>

<section class="forms">
    <div class="container-fluid">
        <?php echo \App\Session::get('managerExist');
        \App\Session::UnsetKeySession('managerExist');
        ?>
        <div class="row">

            <div class="col-lg-6">
                <?php
                echo \App\Session::get('ManagersalaryPaid');
                \App\Session::UnsetKeySession("ManagersalaryPaid");
                echo \App\Session::get('salaryPaid');
                \App\Session::UnsetKeySession('salaryPaid');
                ?>

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Insert manager's monthly salary record</h3>
                    </div>
                    <br/>
<!--                    action="view/admin/view/admin/owner/manager/addManagerSalary.php"-->
                    <form method="post" name="addmanagerSalaryform" onsubmit="return validateManagerSalaryInfoForm()" action="view/admin/view/admin/owner/manager/addManagerSalary.php">


                                <div class="form-group">
                                    <span id="ManagerIDValidator"></span>
                                        <label for="manager_id">Select manager name:</label>
                                    <span id="check"></span>
                                        <select class="form-control" name="manager_id" id="manager_id" onchange="CheckMonthlySalary()">
                                            <option value="">Select Manager</option>
                                            <?php foreach ($manager->getAllmanagers() as $managers) { ?>
                                                <option value="<?php echo $managers['manager_id']?>"><?php echo $managers['name']?></option>
                                            <?php }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <span id="ManageramountValidator"></span>
                                    <label for="amount">Enter amount</label>
                                    <input type="text" name="amount" class="form-control">
                                </div>

                                <div class="form-group">
                                    <span id="ManagerMonthValidator"></span>
                                    <label for="month">Month</label>
                                    <select class="form-control" name="month">
                                        <option value="">Month</option>
                                        <option value="<?php echo date('F',$datetime)?>"><?php echo date('F',$datetime)?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <span id="ManagerYearValidator"></span>
                                    <label for="year">Year</label>
                                    <select class="form-control" name="year">
                                        <option value="">Year</option>
                                        <option value="<?php echo date('Y',$datetime)?>"><?php echo date('Y',$datetime)?></option>
                                    </select>
                                </div>
                        <input type="hidden" value="<?php echo date('Y-m-d')?>" name="date">

                            <div class="form-group pull-right">
                                <input type="submit" value="Insert data" id="addNewManagerSalary" class="btn btn-primary" >
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>



<?php include_once('../../../../includes/footer.php'); ?>
