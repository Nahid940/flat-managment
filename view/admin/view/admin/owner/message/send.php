<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/9/2017
 * Time: 10:59 PM
 */
var_dump($_POST);
include_once '../../../../../../vendor/autoload.php';
\App\Session::init();
$ownerMsg=new \App\ownermessage\OwnerMessage();
$_POST['owner_email']=\App\Session::get('owner_email');
//var_dump($_POST);
$ownerMsg->set($_POST);
$ownerMsg->sendMessage();