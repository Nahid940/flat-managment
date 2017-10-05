<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$query=new \App\query\query();

include_once('../../../../includes/header.php');
?>
    <div class="modal fade" id="sendMessage" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Send message to the resident.</p>

                    <form action="view/admin/view/admin/owner/query/sendmessage.php" method="post">
                        <div class="form-group">
                            <label for="message">Type message</label>
                            <textarea name="message" id="" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group pull-right">
                            <input type="hidden" id="resid" name="resid">
                            <button type="submit" class="btn btn-primary">Send message</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

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

            <div class="row">
                <div class="col-md-12">
                    <?php
                       echo  \App\Session::get('messageSend');
                        \App\Session::UnsetKeySession('messageSend');
                    ?>
                </div>
            </div>

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
                              <td>Send message</td>
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

                              <td><a href="" data-toggle="modal" data-target="#sendMessage" data-id="<?php echo $queries['resident_id']?>" class="btn btn-info sendmsg">Send message</a></td>
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