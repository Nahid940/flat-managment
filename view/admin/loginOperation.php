<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 9/29/2017
 * Time: 5:19 PM
 */
include_once '../../vendor/autoload.php';
$owner=new \App\admin\owner\Owner();
if(isset($_POST['login'])){
//    var_dump($_POST);
    $owner->set($_POST);
    $owner->OwnerLogin();
}