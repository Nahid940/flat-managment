<?php
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
\App\Session::checksession();
$manage=new \App\manager\Manager();


$helper=new \App\Helper();
echo $helper->deleteImage('manager',$_POST['uniqueid']);

$manage->set($_POST);
$manage->deleteManager();
?>