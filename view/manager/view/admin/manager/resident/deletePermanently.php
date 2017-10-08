<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/8/2017
 * Time: 12:13 PM
 */
include_once '../../../../../../vendor/autoload.php';
$resident=new App\resident\residents();
$helper=new \App\Helper();
$helper->deleteImage('resident',$_GET['uniqueid']);

$resident->permanent_Delete($_GET['uniqueid']);