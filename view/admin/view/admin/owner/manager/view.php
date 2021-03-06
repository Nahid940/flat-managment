
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$manager=new \App\manager\Manager();


?>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this account?</p>

                <form action="view/admin/view/admin/owner/manager/delete.php" method="post">
                    <div class="form-group pull-right">
                        <input type="hidden" id="uniqueid" name="uniqueid">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the personnel info</h3>
                    </div>
                    <?php
                        echo \App\Session::get('newManagerInsert');
                        \App\Session::UnsetKeySession('newManagerInsert');

                        echo \App\Session::get('managerDelete');
                        \App\Session::UnsetKeySession('managerDelete');
                        echo \App\Session::get('managareDataupdate');
                        \App\Session::UnsetKeySession('managareDataupdate');

                        echo \App\Session::get('restore');
                        \App\Session::UnsetKeySession('restore');
//
                    ?>
                    <?php foreach ($manager->getAllmanagers() as $managerData){

                    ?>
                    <div class="card-body">
                            <div class="panel panel-info">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Manager  <span style="color:#074870"><?php echo $managerData['name']?></span></h3>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 " align="center">
                                            <table class="table table-user-information">
                                                <tbody>

                                                <tr>
                                                    <td><img src="<?php echo $managerData['image']?>" alt="image" style="width: 150px;height: 150px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td><?php echo $managerData['email']?></td>
                                                </tr>

<!--                                                <tr>-->
<!--                                                    <td>Address:</td>-->
<!--                                                    <td>--><?php //echo $managerData['address']?><!--</td>-->
<!--                                                </tr>-->

                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td><?php echo $managerData['phn']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td><?php echo $managerData['nid']?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <a href="view/admin/view/admin/owner/manager/edit.php?uniqueid=<?php echo $managerData['uniqueid']?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
<!--                                                            <a href="view/admin/view/admin/owner/manager/delete.php?uniqueid=--><?php //echo $managerData['uniqueid']?><!--" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>-->
                                                            <a href="" data-toggle="modal" data-target="#myModal" data-id="<?php echo $managerData['uniqueid']?>" class="btn btn-danger delete">Delete</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                        </div>

                </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once('../../../../includes/footer.php'); ?>