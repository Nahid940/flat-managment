<?php
include_once '../../../../../../vendor/autoload.php';
$datetime=strtotime(date('Y-m-d'));
$month=date('F',$datetime);
$year=date('Y',$datetime);
$manager=new \App\manager\Manager();
if(isset($_POST['manager_id'])){
    $manager_id=$_POST['manager_id'];
}
echo $manager->checkManagerMonthlySalaryPayment($manager_id,$month,$year);