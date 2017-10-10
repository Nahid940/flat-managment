		
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();

include_once('../../../../includes/header.php');
?>

		<section class="forms">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8">
                  <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Manager Form</h3>
                    </div>
                    <div class="card-body">
                      <p>Lorem ipsum dolor sit amet consectetur.</p>
                      <form>
                        <div class="form-group">
                          <label class="form-control-label">Name</label>
                          <input type="text" placeholder="Full Name" class="form-control">
                        </div>
						<div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" placeholder="Email Address" class="form-control">
                        </div>
						<div class="form-group">
                          <label class="form-control-label">Phone</label>
                          <input type="text" placeholder="Phone Number" class="form-control">
                        </div>
						<div class="form-group">
                          <label class="form-control-label">Address</label>
                          <textarea class="form-control"></textarea> 
                        </div>
                        <div class="form-group">       
                          <label class="form-control-label">Password</label>
                          <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">       
                          <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
				</div>
			</div>
		</section>
		
<?php include_once('../../../../includes/footer.php'); ?>