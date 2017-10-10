<?php

include_once '../../../../../../vendor/autoload.php';
$staff=new \App\staff\Staff();

var_dump($_POST);

$staff->set($_POST);
$staff->updateStaff($_POST['uniqueid']);
?>