<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$query=new \App\query\query();

include_once('../../../../includes/header.php');
?>

        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Query of residents</h2>
            </div>
        </header>
          
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Query info</li>
            </div>
          </ul>

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
                      <h3 class="h4">New queries</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">

                          <thead>
                          <tr>
                              <td>Name</td>
                              <td>Query</td>
                              <td>Date</td>
                              <td>Flat no.</td>
                              <td>Floor no.</td>
                              <td>Action</td>
                          </tr>
                          </thead>
                        <tbody>
                        <?php foreach ($query->selectAllUnseenQuery() as $queries){?>

                          <tr class="record">
                              <td><?php echo $queries['name']?></td>
                              <td><?php echo $queries['query']?></td>
                              <td><?php echo $queries['date']?></td>
                              <td><?php echo $queries['flat_no']?></td>
                              <td><?php echo $queries['floor_no']?></td>
                              <td>
                                  <form action="" method="post">
                                      <input type="hidden" value="<?php echo $queries['query_no']?>" name="query_no">
                                      <input type="button" value="Checked" name="checkquery" class="btn btn-primary checkevent" id="button">
                                  </form>
                              </td>
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
		  
		  
		  <?php include_once('../../../../includes/footer.php'); ?>