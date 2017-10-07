<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
$_POST['date']=date('Y-m-d');
$_POST['owner_email']=\App\Session::get('owner_email');
$OwnerNotice=new \App\manager\Notice();

$OwnerNotice->set($_POST);
$OwnerNotice->insertNoticeByManager();
