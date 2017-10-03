<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 10:26 AM
 */
include_once '../../../../../../../vendor/autoload.php';
$totalManager=new \App\manager\Manager();
$total=$totalManager->getTotalManager();
$data=array(
    "total"=>$total,
);
echo json_encode($data);