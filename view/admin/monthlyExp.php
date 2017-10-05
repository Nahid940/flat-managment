<?php
include_once '../../vendor/autoload.php';

$managerCostList=new \App\manager\ManagerCostList();
$data=array();

foreach ($managerCostList->costListMonthly() as $CostData){
        $data[]=$CostData;
}
echo json_encode($data);