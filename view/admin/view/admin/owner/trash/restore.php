<?php
include_once '../../../../../../vendor/autoload.php';
$manager=new \App\manager\Manager();
$manager->restore($_GET['uniqueid']);