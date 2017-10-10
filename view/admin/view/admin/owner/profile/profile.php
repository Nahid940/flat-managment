<?php


include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$owner=new \App\admin\owner\Owner();
$res=$owner->selectOwner(\App\Session::get('owner_email'));


?>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit your profile</h4>
                </div>
                <div class="modal-body">
                    Image: <img src="<?php echo $res['image']?>" alt="" style="height: 120px;width: 120px">
                    <form action="view/admin/view/admin/owner/profile/edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="uniqueid" id="uniqueid" value="<?php echo $res['uniqueid']?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $res['name']?>">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update profile</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <?php
                    echo \App\Session::get('profileUpdate');
                    \App\Session::UnsetKeySession('profileUpdate');
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

                                                </tbody>
                                            </table>
                                            <div class="form-group pull-right">
                                                <a href="" class="btn btn-info editOwnerProfile"  data-toggle="modal" data-target="#myModal" data-id="<?php echo $res['owner_email']?>">Edit your info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<?php include_once('../../../../includes/footer.php');; ?>