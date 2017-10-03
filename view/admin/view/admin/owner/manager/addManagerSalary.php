<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 6:55 PM
 */
include_once '../../../../../../vendor/autoload.php';
$manager=new \App\manager\Manager();

$manager->set($_POST);
$manager->insertManagerMonthlySalary();