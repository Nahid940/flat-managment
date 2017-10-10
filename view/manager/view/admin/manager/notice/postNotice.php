<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
$_POST['date']=date('Y-m-d');
$_POST['manager_id']=\App\Session::get('manager_id');
$managerNotice=new \App\manager\Notice();
//var_dump($_POST);

$managerNotice->set($_POST);
$managerNotice->insertNoticeByManager();
