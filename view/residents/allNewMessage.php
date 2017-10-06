<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:31 PM
 */
include_once '../../vendor/autoload.php';
$ownerMessage=new \App\ownermessage\OwnerMessage();
$data=array();
//$ownerMessage->getAllmessage();
\App\Session::init();

$total=$ownerMessage->total();
$output='';


foreach ($ownerMessage->getAllmessage() as $allmessages){
    $output.="<li><i class=\"fa fa-user-circle bg-green\"></i>".$allmessages['message']."</li><hr/>";
}

if($total>0){
    $data=array(
        "total"=>$total,
        "notify"=>$output
    );
}

echo json_encode($data);
?>