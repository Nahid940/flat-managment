<?php

include_once '../../../../../../vendor/autoload.php';
$helper=new \App\Helper();
$manager=new \App\manager\Manager();
$previousimage=$helper->getPreviousImage($_POST['uniqueid']);

if($_FILES['image']['name']==''){
$_POST['image']=$previousimage;

$manager->set($_POST);
$manager->updateManager($_POST['uniqueid']);

}else{
    $helper->deleteImage('manager',$_POST['uniqueid']);
   $helper->uploadImage('manager');
   $manager->set($_POST);
   $manager->updateManager($_POST['uniqueid']);

}

?>