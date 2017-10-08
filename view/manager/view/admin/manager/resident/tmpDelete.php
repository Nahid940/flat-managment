<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/8/2017
 * Time: 11:51 AM
 */
include_once '../../../../../../vendor/autoload.php';
$resident=new App\resident\residents();
$resident->temporary_Delete($_POST['uniqueid']);