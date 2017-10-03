<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$manager=new \App\manager\Manager();
include_once('../../../../includes/header.php');

?>
          <!-- Breadcrumb-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Expenditure details</h2>
        </div>
    </header>

          <section class="tables">   
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
                      <h3 class="h4">Manager's montly salary payment list</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SL.</th>
                            <th>Manager Name</th>
                            <th>Payment month</th>
                            <th>Payment year</th>
                            <th>Payment date</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        foreach ($manager->getManagerMonthlySalaryList() as $salaryList){
                            $i++;
                            ?>
                          <tr>
                            <th scope="row"><?php echo $i?></th>
                            <td><?php echo $salaryList['name']?></td>
                            <td><?php echo $salaryList['month']?></td>
                            <td><?php echo $salaryList['year']?></td>
                            <td><?php echo $salaryList['date']?></td>
                          </tr>
                            <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>

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
                                <h3 class="h4">Other staff's monthly salary list</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Flat NO</th>
                                        <th>Resident's Name</th>
                                        <th>Payment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>3/B4</td>
                                        <td>Nahid</td>
                                        <td>Paid/Due</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
		  
		  
		  <?php include_once('../../../../includes/footer.php'); ?>