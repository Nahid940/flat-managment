<?php


include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../includes/header.php');
$resident=new App\resident\residents();
$res=$resident->getparticularResInfo(\App\Session::get('resident_id'));


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
                            <h3 class="h4">Your profile</h3>
                        </div>

                            <div class="card-body">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Name : <?php echo \App\Session::get('name')?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12" align="center">
                                                <table class="table table-user-information">
                                                    <tbody>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td><img src="<?php echo $res['image']?>" alt="" style="border-radius: 50px"></td>
                                                    </tr>


                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><?php echo $res['name']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile:</td>
                                                        <td><?php echo $res['phn']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NID No.:</td>
                                                        <td><?php echo $res['nid']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email :</td>
                                                        <td><?php echo $res['email']?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
    </section>

<?php include_once('../includes/footer.php'); ?>