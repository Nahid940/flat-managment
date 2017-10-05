<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 10:29 AM
 */
include_once '../../../../../../vendor/autoload.php';
$staffSalary=new \App\staffPayment\StaffPayment();
date_default_timezone_set('Asia/Dhaka');
$datetime=strtotime(date("Y/m/d"));
$_POST['date']=date('Y-m-d');
$_POST['month']=date('F',$datetime);
$_POST['year']=date('Y',$datetime);
//var_dump($_POST);
$staffSalary->set($_POST);
$staffSalary->staffSalary();
