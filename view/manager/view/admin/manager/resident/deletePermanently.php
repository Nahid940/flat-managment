<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/8/2017
 * Time: 12:13 PM
 */
include_once '../../../../../../vendor/autoload.php';
$resident=new App\resident\residents();
$resident->permanent_Delete($_GET['uniqueid']);