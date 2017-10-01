<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 9/29/2017
 * Time: 5:19 PM
 */
include_once '../../vendor/autoload.php';
$manager=new \App\manager\Manager();
if(isset($_POST['login'])){
//    var_dump($_POST);
    $manager->set($_POST);
    $manager->ManagerLogin();


}