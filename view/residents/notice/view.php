<?php
include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$Notice=new \App\manager\Notice();

include_once('../includes/header.php');
?>
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Notice board</h2>
            </div>
        </header>


          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">

                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Notice from manager</h3>
                    </div>
                    <div class="card-body">
                      <table class="table">

                          <thead>
                          <tr>
                              <td>Sl.</td>
                              <td>Notice</td>
                          </tr>
                          </thead>
                        <tbody>
                        <?php

                    if($Notice->getAllnotice()==0){

                        echo "<h2 style='color: darkred;'>No notice posted yet by owner..</h2>";

                    }else {
                        $i=0;

                        foreach ($Notice->getAllnotice() as $managerNotice) {
                            $i++;
                            ?>
                            <tr class="record">
                                <td><?php echo $i?></td>
                                <td><span style="color: #012600;">Posted by</span>
                                    <strong><?php echo $managerNotice['name'] ?></strong> <span style="color: #012600;">On</span>
                                    <span style="color: #012600;"><?php echo $managerNotice['date'] ?></span>
                                    <br/><?php echo $managerNotice['notice'] ?></td>
                            </tr>
                        <?php }
                    }

                    ?>
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
                      <h3 class="h4">Notice from Owner</h3>
                    </div>
                    <div class="card-body">
                      <table class="table">

                          <thead>
                          <tr>
                              <td>Notice</td>
                          </tr>
                          </thead>
                        <tbody>
                        <?php
                        $i=0;

                        if($Notice->getAllnoticeFromOwner()==0){

                            echo "<h2 style='color: darkred;'>No notice posted yet by owner..</h2>";

                        }else {


                            foreach ($Notice->getAllnoticeFromOwner() as $OwnerNotice) {
                                $i++;
                                ?>
                                <tr class="record">
                                    <td><?php echo $i?></td>
                                    <td><span style="color: #012600;">Posted by</span>
                                        <strong><?php echo $OwnerNotice['name'] ?></strong> <span
                                                style="color: #012600;">On</span> <span
                                                style="color: #012600;"><?php echo $OwnerNotice['date'] ?></span>
                                        <br/><?php echo $OwnerNotice['notice'] ?></td>
                                </tr>
                            <?php }
                        }

    ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>








<!--                <div class="row">-->
<!--                    <div class="col-lg-12">-->
<!--                        <div class="card">-->
<!--                            <div class="card-close">-->
<!--                                <div class="dropdown">-->
<!--                                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>-->
<!--                                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="card-header d-flex align-items-center">-->
<!--                                <h3 class="h4">Message from Mmanager...</h3>-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!--                                <table class="table table-striped">-->
<!---->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <td>Message</td>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    --><?php //foreach ($ownerMessage->getAllmessage() as $ownerMsg){?>
<!--                                        <tr class="record">-->
<!--                                            <td>--><?php //echo $ownerMsg['message']?><!--</td>-->
<!--                                            <td>-->
<!--<!--                                                <form action="" method="post">-->
<!--<!--                                                    <input type="hidden" value="--><?php ////echo $queries['query_no']?><!--<!--" name="query_no">-->
<!--<!--                                                    <input type="button" value="Checked" name="checkquery" class="btn btn-primary checkevent" id="button">-->
<!--<!--                                                </form>-->
<!--                                            </td>-->
<!---->
<!--                                            <!--                              <td><a href="" data-toggle="modal" data-target="#sendMessage" data-id="--><?php ////echo $queries['resident_id']?><!--<!--" class="btn btn-info sendmsg">Send message</a></td>-->
<!--                                        </tr>-->
<!--                                    --><?php //}?>
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
            </div>
          </section>
		  
		  
		  <?php include_once('../includes/footer.php'); ?>