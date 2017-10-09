<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/2/2017
 * Time: 10:51 PM
 */
include_once '../../../../../../vendor/autoload.php';
$AddNewManager=new \App\manager\Manager();
$helper=new \App\Helper();



$_POST['uniqueid']=$uniqueid=md5(time());
//$helper->uploadImage();
$AddNewManager=new \App\manager\Manager();
$helper=new \App\Helper();

$helper->uploadImage('manager');

$AddNewManager->set($_POST);
$AddNewManager->insertNewManager();
