
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');


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
                    <div class="card-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Manager Nahid</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 " align="center">
                                            <table class="table table-user-information">
                                                <tbody>

                                                <tr>
                                                    <td>Image</td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td>nahid940@gmail.com</td>
                                                </tr>

                                                <tr>
                                                    <td>Address:</td>
                                                    <td>Dhaka</td>
                                                </tr>

                                                <tr>
                                                    <td>Mobile:</td>
                                                    <td>435646</td>
                                                </tr>
                                                <tr>
                                                    <td>Gender:</td>
                                                    <td>Male</td>
                                                </tr>

                                                <tr>
                                                    <td>Date of Birth</td>
                                                    <td>10-1013</td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" value="<?php echo $userData['email']?>" id="userEmail" name="userEmail"/>
                                                            <input type="button" data-toggle="modal" data-target="#view-modal" value="Update" name="edit"  class="btn btn-primary updateUser" id="updateUser" />

                                                        </form>
                                                    </td>
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

<?php include_once('../../../../includes/footer.php'); ?>