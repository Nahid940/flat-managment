<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/6/2017
 * Time: 2:25 PM
 */
include_once '../../../vendor/autoload.php';
\App\Session::init();
$query=new \App\query\query();
$_POST['resident_id']=\App\Session::get('resident_id');
$_POST['date']=date('Y-m-d');
$query->set($_POST);
$query->sendQuery();
