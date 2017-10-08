<?php
include_once '../../vendor/autoload.php';
$managerMessage=new \App\manager\managerMessage();
$data=array();
//$ownerMessage->getAllmessage();
\App\Session::init();



$total=$managerMessage->total(\App\Session::get('resident_id'));
$output='';


foreach ($managerMessage->getAllmessage(\App\Session::get('resident_id')) as $allmessages){
    $output.="<li><i class=\"fa fa-user-circle bg-green\"></i>".$allmessages['manager_message']."</li><hr/>";
}

if($total>0){
    $data=array(
        "total"=>$total,
        "notify"=>$output
    );
}

echo json_encode($data);
?>