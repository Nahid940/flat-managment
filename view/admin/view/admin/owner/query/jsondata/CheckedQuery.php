<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/4/2017
 * Time: 12:48 AM
 */
include_once '../../../../../../../vendor/autoload.php';
$checkedQuery=new \App\query\query();
$_POST['query_no'];
$checkedQuery->set($_POST);
//var_dump($_POST);
$checkedQuery->checkQuery();