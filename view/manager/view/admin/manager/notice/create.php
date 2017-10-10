		
<?php

include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();

include_once('../../../../includes/header.php');

?>

		<section class="forms">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 offset-1">
                        <?php echo \App\Session::get('managerNotice');
                        \App\Session::UnsetKeySession('managerNotice');
                        ?>
                  <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Post your valuable notice for all residents</h3>

                    </div>
                    <div class="card-body">
                        <span id="validateNotice"></span>

                      <form method="post" name="mngrNoticeForm" action="view/manager/view/admin/manager/notice/postNotice.php" onsubmit="return validateMngrNotice()">

						<div class="form-group">
                          <label class="form-control-label"><strong>Write your notice</strong></label>
                          <textarea placeholder="Write here...." class="form-control" rows="10" name="notice" id="mngrNotice"></textarea>
                        </div>
						<div class="form-group pull-right">
                          <input type="submit" value="Post notice" class="btn btn-primary">
                        </div>


                      </form>
                    </div>
                  </div>
                </div>
				</div>
			</div>
		</section>
		
<?php include_once('../../../../includes/footer.php'); ?>