<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 9:51 PM
 */
include_once '../../../../../../vendor/autoload.php';
$resident=new App\resident\residents();
$_POST['uniqueid']=$uniqueid=md5(time());
$resident->set($_POST);
$resident->insertNewResidents();