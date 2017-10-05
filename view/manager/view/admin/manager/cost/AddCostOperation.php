<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();

$managerMaintenance=new \App\manager\ManagerCostList();
date_default_timezone_set('Asia/Dhaka');
$_POST['date']=date('Y-m-d');
$datetime=strtotime(date('Y-m-d'));
$_POST['month']=date('F',$datetime);
$_POST['manager_id']=\App\Session::get('manager_id');
var_dump($_POST);

$managerMaintenance->set($_POST);
$managerMaintenance->ManagerExpenditure();