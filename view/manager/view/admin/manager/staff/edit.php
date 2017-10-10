
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();

include_once('../../../../includes/header.php');
$staff=new \App\staff\Staff();

$staff->set($_GET);
$res=$staff->getSingleStaff();

?>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                //echo \App\Session::get('newStaffInsert');
                //\App\Session::UnsetKeySession('newStaffInsert');

                ?>

                <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the personnel info</h3>
                    </div>
                    <div class="col-md-6">

                    <form method="post" name="addStaffModalform"  enctype="multipart/form-data" action="view/manager/view/admin/manager/staff/update.php">

                        <input type="hidden" value="<?php echo $res['uniqueid']?>" name="uniqueid">
                                    <div class="form-group">
                                        <span id="IDvalidatorModal"></span>
                                        <label>Assign ID</label>
                                        <input type="text" name="staff_id" id="staff_id" value="<?php echo $res['staff_id']?>" placeholder="Assign ID" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <span id="namevalidatorModal"></span>
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" value="<?php echo $res['name']?>" placeholder="Enter person name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <span id="AgevalidatorModal"></span>
                                        <label>Age</label>
                                        <input type="text" name="age" id="age" placeholder="Enter person age" value="<?php echo $res['age']?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <span id="NIDvalidatorModal"></span>
                                        <label>NID No.</label>
                                        <input type="text" name="nid" id="nid" placeholder="Enter person NID No." value="<?php echo $res['nid']?>" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <span id="PhnvalidatorModal"></span>
                                        <label>Phone No.</label>
                                        <input type="text" name="phn" id="phn" placeholder="Enter person age" class="form-control" value="<?php echo $res['phn']?>">
                                    </div>


                                    <div class="form-group">
                                        <span id="EmailvalidatorModal"></span>
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" placeholder="Enter person email" class="form-control" value="<?php echo $res['email']?>">
                                    </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="Update info" id="addNewStaff" class="btn btn-primary" >
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php include_once('../../../../includes/footer.php'); ?>