<?php


include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
//$resident=new App\resident\residents();
//$res=$resident->getparticularResInfo(\App\Session::get('resident_id'));
$manager=new \App\manager\Manager();
$res=$manager->getOnemanagers($_GET['uniqueid']);
?>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <?php
                    echo \App\Session::get('newStaffInsert');
                    \App\Session::UnsetKeySession('newStaffInsert');
                    ?>

                    <div class="card">
                        <div class="card-close">

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Staff profile</h3>
                        </div>

                        <div class="card-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12" align="center">
                                            <form action="view/admin/view/admin/owner/manager/update.php" method="post" enctype="multipart/form-data">
                                            <table class="table table-user-information">
                                                <input type="hidden" value="<?php echo $res['uniqueid']?>" name="uniqueid">
                                                <tbody>
                                                <tr>
                                                    <td>Image</td>
                                                    <td><img src="<?php echo $res['image']?>" alt="" style="height: 100px;width: 100px"></td>
                                                </tr>

                                                <tr>
                                                    <td>Name:</td>
                                                    <td><input type="text" value="<?php echo $res['name']?>" class="form-control" name="name"></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td><input type="text" value="<?php echo $res['phn']?>" class="form-control" name="phn"></td>
                                                </tr>
                                                <tr>
                                                    <td>NID No.:</td>
                                                    <td><input type="text" value="<?php echo $res['nid']?>" class="form-control" name="nid"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><input type="text" value="<?php echo $res['email']?>" class="form-control" name="email"></td>
                                                </tr>
                                                <tr>
                                                    <td>Image :</td>
                                                    <td><input type="file" name="image" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button class="btn btn-success">Update info</button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

<?php include_once('../../../../includes/footer.php'); ?>