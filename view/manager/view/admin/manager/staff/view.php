
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$staff=new \App\staff\Staff();

?>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                echo \App\Session::get('newStaffInsert');
                \App\Session::UnsetKeySession('newStaffInsert');

                echo \App\Session::get('StaffUpdate');
                \App\Session::UnsetKeySession('StaffUpdate');
                ?>

                <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the personnel info</h3>
                    </div>
                    <?php foreach ($staff->getAllStaffList() as $staffData){?>
                    <div class="card-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Staff <?php echo $staffData['name']?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 " align="center">
                                            <table class="table table-user-information">
                                                <tbody>

                                                <tr>
                                                    <td><img src="<?php echo $staffData['image']?>" alt="" style="height: 120px;width: 120px"></td>
                                                </tr>

                                                <tr>
                                                    <td>Age:</td>
                                                    <td><?php echo $staffData['age']?></td>
                                                </tr>

                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td><?php echo $staffData['phn']?></td>
                                                </tr>
                                                <tr>
                                                    <td>NID No.:</td>
                                                    <td><?php echo $staffData['nid']?></td>
                                                </tr>


                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="view/manager/view/admin/manager/staff/edit.php?uniqueid=<?php echo $staffData['uniqueid']?>" class="btn btn-info">Edit</a>
                                                        <a href="view/manager/view/admin/manager/staff/delete.php?uniqueid=<?php echo $staffData['uniqueid']?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
                <?php }?>

            </div>
        </div>
    </div>
</section>

<?php include_once('../../../../includes/footer.php'); ?>