
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$manager=new \App\manager\Manager();


?>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the personnel info</h3>
                    </div>
                    <?php
                        echo \App\Session::get('newManagerInsert');
                        \App\Session::UnsetKeySession('newManagerInsert');

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
                                                    <td><img src="<?php echo $managerData['image']?>" alt="image"></td>
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
                                                            <a href="view/admin/view/admin/owner/manager/delete.php?uniqueid=<?php echo $managerData['uniqueid']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

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