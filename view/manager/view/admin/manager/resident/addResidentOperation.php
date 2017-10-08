<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 9:51 PM
 */
include_once '../../../../../../vendor/autoload.php';

$resident=new App\resident\residents();
$helper=new \App\Helper();
$helper->uploadImage('resident');
$_POST['uniqueid']=$uniqueid=md5(time());

//var_dump($_POST);
$resident->set($_POST);
$resident->insertNewResidents();
$resident->bookFlat();
