<?php


include_once '../../../vendor/autoload.php';
$query=new \App\query\query();
\App\Session::init();
$_POST['resident_id']=\App\Session::get('resident_id');
$_POST['date']=date('Y-m-d');

$query->set($_POST);
$query->sendQuery();
