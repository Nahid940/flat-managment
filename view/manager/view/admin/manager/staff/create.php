		
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
include_once('../../../../includes/header.php');

?>

		<section class="forms">
			<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-close">
                                    <div class="dropdown">
                                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                    </div>
                                </div>
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="h4">Click to add new staff info</h3>
                                </div>
                                <div class="card-body text-center">
                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add new staff info </button>
                                    <!-- Modal-->
                                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Record new staff info</p>

                                                    <form method="post" name="addStaffModalform" onsubmit="return validateStaffInfoForm()"  enctype="multipart/form-data" action="view/manager/view/admin/manager/staff/addNewStaff.php">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="IDvalidatorModal"></span>
                                                                        <label>Assign ID</label>
                                                                        <input type="text" name="staff_id" id="staff_id" onkeyup="checkExistingStaffID();" placeholder="Assign ID" class="form-control">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="namevalidatorModal"></span>
                                                                        <label>Name</label>
                                                                        <input type="text" name="name" id="name" placeholder="Enter person name" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="AgevalidatorModal"></span>
                                                                        <label>Age</label>
                                                                        <input type="text" name="age" id="age" placeholder="Enter person age" class="form-control">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="NIDvalidatorModal"></span>
                                                                        <label>NID No.</label>
                                                                        <input type="text" name="nid" id="nid" placeholder="Enter person NID No." class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="PhnvalidatorModal"></span>
                                                                        <label>Phone No.</label>
                                                                        <input type="text" name="phn" id="phn" placeholder="Enter person age" class="form-control">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="EmailvalidatorModal"></span>
                                                                        <label>Email</label>
                                                                        <input type="text" name="email" id="email" placeholder="Enter person email" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="PasswordValidatorModal"></span>
                                                                        <label>Password</label>
                                                                        <input type="password" placeholder="Password" name ="password" id="password" class="form-control">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <span id="ConfirmPasswordValidatorModal"></span>
                                                                        <label>Confirm password</label>
                                                                        <input type="password" placeholder="Confirm password" name="cpassword" id="cpassword" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div class="form-group">
                                                            <span id="Imagevalidator"></span>
                                                            <label for="image">Select image</label>
                                                            <input type="file" name="image"  id="image" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" value="Add new staff info" id="addNewStaff" class="btn btn-primary" >
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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
		
<?php include_once('../../../../includes/footer.php'); ?>