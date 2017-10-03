<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:45 AM
 */

include_once '../../../../../../vendor/autoload.php';
$AddNewStaff=new \App\staff\Staff();

$filename=$_FILES['image']['name'];
$filelocation=$_FILES['image']['tmp_name'];
$div=explode('.',$filename);

$fileExtension=strtolower(end($div));
$uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
$uploaded_image = "images/staff/".$uniqueName;
move_uploaded_file($filelocation,"../../../../../../".$uploaded_image);

$_POST['image']=$uploaded_image;
$_POST['uniqueid']=$uniqueid=md5(time());

//var_dump($_POST);
$AddNewStaff->set($_POST);
$AddNewStaff->insertNewStaff();

