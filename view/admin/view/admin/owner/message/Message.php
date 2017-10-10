<?php


include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$resident=new App\resident\residents();

include_once('../../../../includes/header.php');

?>

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-1">
                    <?php echo \App\Session::get('messageSend');
                    \App\Session::UnsetKeySession('messageSend');
                    ?>
                    <div class="card">
                        <div class="card-close">

                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Send message to any of your resident...</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="view/admin/view/admin/owner/message/send.php" name="MngrMessage" onsubmit="return validateOwnerMessage()">
                                <div class="form-group">

                                    <label for="resident_id">Select resident's name:</label>
                                    <span id="ResValidator"></span>
                                    <select class="form-control" name="resid">
                                        <option value="">Select name</option>
                                        <?php foreach ($resident->selectAllResidentForPayment() as $allResident) { ?>
                                            <option value="<?php echo $allResident['resident_id']?>"><?php echo $allResident['name']."   | flat no : ".$allResident['flat_no']?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"><strong>Write your message</strong></label>
                                    <span id="ValidateMessage"></span>
                                    <textarea placeholder="Write here...." class="form-control" rows="10" name="message"></textarea>
                                </div>
                                <div class="form-group pull-right">
                                    <input type="submit" value="Send notice" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once('../../../../includes/footer.php'); ?>