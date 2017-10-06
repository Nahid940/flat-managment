
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$resident=new \App\resident\residents();

?>

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">

                    <?php

                    echo \App\Session::get('newResidentInsert');
                    \App\Session::UnsetKeySession('newResidentInsert');
                    ?>

                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the personnel info</h3>



                    </div>
                    <?php foreach ( $resident->selectAllResident() as $Data){?>
                    <div class="card-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Staff <?php echo $Data['name']?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 " align="center">
                                            <table class="table table-user-information">
                                                <tbody>

                                                <tr>
                                                    <td><img src="<?php echo $Data['image']?>" alt=""></td>
                                                </tr>


                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td><?php echo $Data['phn']?></td>
                                                </tr>
                                                <tr>
                                                    <td>NID No.:</td>
                                                    <td><?php echo $Data['nid']?></td>
                                                </tr>
                                                <tr>
                                                    <td>Flat No.:</td>
                                                    <td><?php echo $Data['flat_no']?></td>
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