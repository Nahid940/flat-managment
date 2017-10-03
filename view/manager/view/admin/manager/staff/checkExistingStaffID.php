<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 1:40 AM
 */  if(isset($_POST['manager_id'])){
    $manager_id=$_POST['manager_id'];

    include_once '../../../../../../vendor/autoload.php';
    $manager=new \App\manager\Manager();
    $manager->set($_POST);
    echo $manager->checkSameManagerID();

}
