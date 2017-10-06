<?php
include_once '../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$query=new \App\query\query();

include_once('../includes/header.php');
?>


    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Query of residents</h2>
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">
            <?php
            echo  \App\Session::get('querySend');
            \App\Session::UnsetKeySession('querySend');
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <form action="view/residents/query/sendmessage.php" method="post" onsubmit="return validateQuery()" name="queryPost">
                <div class="form-group">
                    <label for="query">Write your query...</label>
                    <span id="queryCheck"></span>
                    <textarea name="query" id="" cols="30" rows="10" class="form-control"></textarea>

                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">Send query</button>
                </div>
            </form>
        </div>
    </div>




<?php include_once('../includes/footer.php'); ?>