<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 10:29 PM
 */

include_once '../../../../../../vendor/autoload.php';
$manager_message=new \App\manager\managerMessage();
\App\Session::init();
$_POST['manager_id']=\App\Session::get('manager_id');
$manager_message->set($_POST);
$manager_message->send();
//var_dump($_POST);
//$ownerMessage->set($_POST);
//$ownerMessage->sendMessage();
