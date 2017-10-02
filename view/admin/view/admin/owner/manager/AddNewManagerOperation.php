<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/2/2017
 * Time: 10:51 PM
 */
include_once '../../../../../../vendor/autoload.php';
$AddNewManager=new \App\manager\Manager();

$filename=$_FILES['image']['name'];
$filelocation=$_FILES['image']['tmp_name'];
$div=explode('.',$filename);

$fileExtension=strtolower(end($div));
$uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
$uploaded_image = "images/".$uniqueName;
move_uploaded_file($filelocation,"../../../../../../".$uploaded_image);

$_POST['image']=$uploaded_image;
$_POST['uniqueid']=$uniqueid=md5(time());


$AddNewManager->set($_POST);
$AddNewManager->insertNewManager();


//var_dump($_POST);