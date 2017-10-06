<?php

//include_once '../../vendor/autoload.php';
//\App\Session::init();
//var_dump(\App\Session::get('managername'));
//var_dump(\App\Session::get('login'));
//\App\Session::checkSession();


include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checkSession();
$residentPayment=new \App\flatrentPayment\ResidentPayment();


include_once('../includes/header.php');



?>
    <!-- Dashboard Header Section    -->

    <section class="dashboard-counts no-padding-bottom">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    echo \App\Session::get('querySend');
                    \App\Session::UnsetKeySession('querySend');
                    ?>
                </div>
            </div>
            <div class="row bg-white has-shadow">


                    <div class="col-lg-12">

                        <form class="form" method="post" action="view/residents/query/sendQuery.php" onsubmit="return validateQuery()" name="queryPost">
                            <div class="form-group">

                                <label for="message">Type your message</label>
                                <span id="queryCheck"></span>
                                <textarea name="query" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success" >Send query</button>
                            </div>
                        </form>
                </div>

            </div>
        </div>
    </section>




    <!-- Page Footer-->
<?php include_once('../includes/footer.php');

?>