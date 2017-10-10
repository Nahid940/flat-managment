<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/10/2017
 * Time: 6:25 PM
 */
include_once '../../../../../../vendor/autoload.php';
$owner=new \App\admin\owner\Owner();
$helper=new \App\Helper();

if($_FILES['image']['name']==''){
    $_POST['image']=$helper->getOwnerPreviousImage($_POST['uniqueid']);
    $owner->set($_POST);
    $owner->updateProfile();
}else{
    $helper->deleteImage('owner',$_POST['uniqueid']);
    $helper->uploadImage('owner');
    $owner->set($_POST);
    $owner->updateProfile();
}



