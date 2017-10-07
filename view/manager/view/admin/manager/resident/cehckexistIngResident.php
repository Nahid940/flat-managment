<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/7/2017
 * Time: 2:50 PM
 */



include_once '../../../../../../vendor/autoload.php';
if(isset($_POST['resident_id'])){
    $resident_id=$_POST['resident_id'];

}
$resident =new App\resident\residents();
echo $resident->selectExistingResident($resident_id);