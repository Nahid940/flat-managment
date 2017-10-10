<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/10/2017
 * Time: 11:39 AM
 */
include_once '../../vendor/autoload.php';
$owner=new \App\admin\owner\Owner();
$helper= new \App\Helper();
$helper->uploadImageOwnerReg('owner');
$_POST['uniqueid']=$uniqueid=md5(time()).rand();

$owner->set($_POST);
$owner->ownerReg();