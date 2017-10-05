<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:31 PM
 */
include_once '../../../../../../../vendor/autoload.php';
$query=new \App\query\query();
$data=array();
$total=$query->newQuery();
$output='';


foreach ($query->selectAllUnseenQuery() as $allComments){
    $output.="<li><i class=\"fa fa-user-circle bg-green\"></i>".$allComments['query']."</li><hr/>";
}

if($total>0){
    $data=array(
        "total"=>$total,
        "notify"=>$output

    );
}

echo json_encode($data);
?>