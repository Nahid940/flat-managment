<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/4/2017
 * Time: 12:48 AM
 */
include_once '../../../../../../../vendor/autoload.php';
$checkedQuery=new \App\query\query();
if(isset($_POST['query_no'])){
    $query_no=$_POST['query_no'];
    $checkedQuery->checkQuery($query_no);
}

