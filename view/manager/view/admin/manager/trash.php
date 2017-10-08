<?php

include_once '../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$resident=new App\resident\residents();

include_once('../../../includes/header.php');

?>
    <!-- Breadcrumb-->
    <ul class="breadcrumb">
        <div class="container-fluid">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Expenditure</li>
        </div>
    </ul>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <?php echo \App\Session::get('permDelete');

                \App\Session::UnsetKeySession('permDelete');
                ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Maintenance cost list</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" id="expenditureList">

                                <thead>
                                <tr>

                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Phn</th>
                                    <th>NID</th>
                                    <th>Flat no.</th>
                                    <th>Email</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>

                                <?php


                                foreach ($resident->trashData() as $trashData){

                                    ?>
                                    <tr>
                                        <td><?php echo $trashData['name']?></td>
                                        <td><?php echo $trashData['phn']?></td>
                                        <td><?php echo $trashData['nid']?></td>
                                        <td><?php echo $trashData['flat_no']?></td>
                                        <td><?php echo $trashData['email']?></td>

                                        <td><a href="view/manager/view/admin/manager/resident/deletePermanently.php?uniqueid=<?php echo $trashData['uniqueid']?>" class="btn btn-danger">Delete permanently</a></td>

                                    </tr>

                                <?php }?>

                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

            </div>




        </div>

    </section>


<?php include_once('../../../includes/footer.php'); ?>