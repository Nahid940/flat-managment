		
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();

include_once('../../../../includes/header.php');
?>

        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Add new info</h2>
            </div>
        </header>
<!--<div class="container-fluid">-->
<!--    <!--            <li class="breadcrumb-item"><a href="index.html">Home</a></li>-->-->
<!--    <!--            <li class="breadcrumb-item active">Query info</li>-->-->
<!--    --><?php
//    $url = "$_SERVER[REQUEST_URI]";
//    $last=explode("/",$url);
//    $lastelement=rtrim(end($last),'.php');
//    echo "<pre>";
//    print_r($last);
//
//    ?>
<!--</div>-->
<section class="forms">

<!--			<div class="container-fluid">-->
<!--				<div class="row">-->
<!--					<div class="col-lg-8">-->
<!--                  <div class="card">-->
<!--                    <div class="card-close">-->
<!--                      <div class="dropdown">-->
<!--                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>-->
<!--                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    <div class="card-header d-flex align-items-center">-->
<!--                      <h3 class="h4">Manager Form</h3>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                      <p>Lorem ipsum dolor sit amet consectetur.</p>-->
<!--                      <form>-->
<!--                        <div class="form-group">-->
<!--                          <label class="form-control-label">Name</label>-->
<!--                          <input type="text" placeholder="Full Name" class="form-control">-->
<!--                        </div>-->
<!--						<div class="form-group">-->
<!--                          <label class="form-control-label">Email</label>-->
<!--                          <input type="email" placeholder="Email Address" class="form-control">-->
<!--                        </div>-->
<!--						<div class="form-group">-->
<!--                          <label class="form-control-label">Phone</label>-->
<!--                          <input type="text" placeholder="Phone Number" class="form-control">-->
<!--                        </div>-->
<!--						<div class="form-group">-->
<!--                          <label class="form-control-label">Address</label>-->
<!--                          <textarea class="form-control"></textarea>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                          <label class="form-control-label">Password</label>-->
<!--                          <input type="password" placeholder="Password" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                          <input type="submit" value="Submit" class="btn btn-primary">-->
<!--                        </div>-->
<!--                      </form>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--				</div>-->
<!--			</div>-->




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
                                        <h3 class="h4">Click to add new manager info</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add new manager info </button>
                                        <!-- Modal-->
                        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem ipsum dolor sit amet consectetur.</p>

                                        <form method="post" name="addmanagerModalform" onsubmit="validateForm()">
                                            <div class="form-group">
                                                <span id="namevalidatorModal"></span>
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" placeholder="Enter person name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Add Manager" class="btn btn-primary">
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



<!--                    <div class="col-lg-6">-->
<!--                        <div class="card">-->
<!--                            <div class="card-close">-->
<!--                                <div class="dropdown">-->
<!--                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>-->
<!--                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-header d-flex align-items-center">-->
<!--                                <h3 class="h4">Click to add new staff info</h3>-->
<!--                            </div>-->
<!--                            <div class="card-body text-center">-->
<!--                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add new manager info </button>-->
<!--                                <!-- Modal-->-->
<!--                                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">-->
<!--                                    <div role="document" class="modal-dialog">-->
<!--                                        <div class="modal-content">-->
<!--                                            <div class="modal-header">-->
<!--                                                <h4 id="exampleModalLabel" class="modal-title">Signin Modal</h4>-->
<!--                                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>-->
<!--                                            </div>-->
<!--                                            <div class="modal-body">-->
<!--                                                <p>Lorem ipsum dolor sit amet consectetur.</p>-->
<!--                                        <form name="addNewsatffModal" onsubmit="return check2()" method="post">-->
<!--                                            <div class="form-group">-->
<!--                                                <label>Email</label>-->
<!--                                                <input type="email" placeholder="Email Address" name="email" class="form-control">-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <label>Password</label>-->
<!--                                                <input type="password" placeholder="Password" class="form-control">-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <input type="submit" value="Signin" class="btn btn-primary">-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                            </div>-->
<!--                                            <div class="modal-footer">-->
<!--                                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>-->
<!--                                                <button type="button" class="btn btn-primary">Save changes</button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
		</section>

<script>

</script>
		
<?php include_once('../../../../includes/footer.php'); ?>