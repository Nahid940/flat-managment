
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');
$resident=new \App\resident\residents();

?>


<div class="modal fade" id="myModalRes" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this account?</p>

                <form action="view/manager/view/admin/manager/resident/tmpDelete.php" method="post">
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
                    <?php

                    echo \App\Session::get('tmpDelete');
                    \App\Session::UnsetKeySession('tmpDelete');
                    ?>

                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">All the resident's info</h3>


                    </div>


                    <?php

                    if(isset($_GET['page'])){
                        $pageNumber=$_GET['page'];
                    }else{
                        $pageNumber=0;
                    }


                    if($pageNumber==0 || $pageNumber==1){
                        $page1=0;
                    }else{
                        $page1=($pageNumber*5)-5;
                    }

                    foreach ( $resident->selectAllResident($page1) as $Data){?>
                    <div class="card-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Resident <?php echo $Data['name']?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 " align="center">
                                            <table class="table table-user-information">
                                                <tbody>

                                                <tr>
                                                    <td>Image</td>
                                                    <td><img src="<?php echo $Data['image']?>" alt="" style="height: 180px; width: 150px"></td>
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
                                                        <a data-id="<?php echo $Data['uniqueid']?>" data-toggle="modal" data-target="#myModalRes" class="btn btn-danger delete">Delete</a>
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

                <?php
                $total= $resident->selectTotalResident();
                $perPage=$total/1;
                for($i=1;$i<=$perPage;$i++){
                    ?>
                    <div class="pagination" style="display: inline-block;">
                        <a href="http://localhost/BITM/bitm-final-project/view/manager/view/admin/manager/resident/view.php?page=<?php echo $i?>" style="color: black;float: left;padding: 8px 16px;text-decoration: none; border: 1px solid #ddd"><?php echo $i?></a>
                    </div>
                <?php } ?>

        </div>
        </div>


    </div>

</section>





<?php include_once('../../../../includes/footer.php'); ?>