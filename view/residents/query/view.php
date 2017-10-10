<?php
include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$ownerMessage=new App\ownermessage\OwnerMessage();
$managerMessage=new \App\manager\managerMessage();

include_once('../includes/header.php');
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

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Message from manager...</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">
                          <thead>
                          <tr>
                              <td>Message</td>
                          </tr>
                          </thead>
                        <tbody>
                        <?php foreach ($managerMessage->getAllmessage(\App\Session::get('resident_id')) as $mngrMessage){?>
                          <tr class="record">
                              <td><?php echo $mngrMessage['manager_message']?></td>
                              <td>

                              </td>

<!--                              <td><a href="" data-toggle="modal" data-target="#sendMessage" data-id="--><?php //echo $queries['resident_id']?><!--" class="btn btn-info sendmsg">Send message</a></td>-->
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

                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">Message from owner...</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">

                                    <thead>
                                    <tr>
                                        <td>Message</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($ownerMessage->getAllmessage() as $ownerMsg){?>
                                        <tr class="record">
                                            <td><?php echo $ownerMsg['message']?></td>
                                            <td>
<!--                                                <form action="" method="post">-->
<!--                                                    <input type="hidden" value="--><?php //echo $queries['query_no']?><!--" name="query_no">-->
<!--                                                    <input type="button" value="Checked" name="checkquery" class="btn btn-primary checkevent" id="button">-->
<!--                                                </form>-->
                                            </td>

                                            <!--                              <td><a href="" data-toggle="modal" data-target="#sendMessage" data-id="--><?php //echo $queries['resident_id']?><!--" class="btn btn-info sendmsg">Send message</a></td>-->
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
		  
		  
		  <?php include_once('../includes/footer.php'); ?>