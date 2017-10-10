<?php
include_once '../../../../../../vendor/autoload.php';
$manager=new \App\manager\Manager();
$manager->permanentDelete($_GET['uniqueid']);