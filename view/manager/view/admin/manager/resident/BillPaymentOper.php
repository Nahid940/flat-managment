<?php
include_once '../../../../../../vendor/autoload.php';
$resPayment=new \App\flatrentPayment\ResidentPayment();
date_default_timezone_set('Asia/Dhaka');
$datetime=strtotime(date("Y/m/d"));
$_POST['date']=date('Y-m-d');
$_POST['month']=date('F',$datetime);
var_dump($_POST);

$resPayment->set($_POST);
$resPayment->insertResidentPeyment();


