
<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
//$flats=new \App\flats\Flat();


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
        <?php
        echo \App\Session::get('residentExist');
        \App\Session::UnsetKeySession('residentExist');
        ?>

        <div class="row">
            <div class="col-lg-6">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Click to add new residents info</h3>
                    </div>

<!--                action="view/admin/view/admin/manager/resident/AddResidents.php"-->
                            <form method="post" name="addResidentform" onsubmit="return validateNewResidentInfoForm()" enctype="multipart/form-data" action="view/manager/view/admin/manager/resident/addResidentOperation.php">
<!--                                <label for="sel1">Select list:</label>-->

<!--                                <select class="form-control" name="flat_no">-->
<!--                                    <option>Available flat list </option>-->
<!--                                    --><?php //foreach ($flats->selectAllAvaliableFlat() as $avflats){?>
<!--                                    <option value="--><?php //echo $avflats['flat_no']?><!--">--><?php //echo $avflats['flat_no']?><!--</option>-->
<!--                                    --><?php //}?>
<!--                                </select>-->


                                    <div class="form-group">
                                        <span id="IDvalidatorModal"></span>
                                        <label>Assign ID</label>
                                        <input type="text" name="resident_id" id="resident_id"  placeholder="Assign ID Eg: res01" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <span id="namevalidatorModal"></span>
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter person name" class="form-control">
                                    </div>



                                    <div class="form-group">
                                        <span id="AgevalidatorModal"></span>
                                        <label>Age</label>
                                        <input type="text" name="age" id="age" placeholder="Enter person age" class="form-control">
                                    </div>



                                    <div class="form-group">
                                        <span id="NIDvalidatorModal"></span>
                                        <label>NID No.</label>
                                        <input type="text" name="nid" id="nid" placeholder="Enter person NID No." class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <spam id="PhnvalidatorModal"></spam>
                                        <label>Phone No.</label>
                                        <input type="text" name="phn" id="phn" placeholder="Enter person age" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <span id="EmailvalidatorModal"></span>
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" placeholder="Enter person email" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <span id="PasswordValidatorModal"></span>
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name ="password" id="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <span id="ConfirmPasswordValidatorModal"></span>
                                        <label>Confirm password</label>
                                        <input type="password" placeholder="Confirm password" name="cpassword" id="cpassword" class="form-control">
                                    </div>

                                    <div class="form-group pull-right">
                                        <input type="submit" value="Add resident" id="addNewResidents" class="btn btn-primary" >
                                    </div>
                                </form>

            </div>
        </div>
    </div>
</section>



<?php include_once('../../../../includes/footer.php'); ?>