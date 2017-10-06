<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 10:29 PM
 */

include_once '../../../../../../vendor/autoload.php';
$ownerMessage=new \App\ownermessage\OwnerMessage();
\App\Session::init();
$_POST['owner_email']=\App\Session::get('owner_email');
$ownerMessage->set($_POST);
$ownerMessage->sendMessage();
