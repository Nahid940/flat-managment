<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/8/2017
 * Time: 11:43 PM
 */

namespace App\manager;


use App\DBConnection;
use App\Session;

class managerMessage
{

    private $message;
    private $resident_id;
    private $manager_id;

    public function set($data){
        if(array_key_exists('message',$data)){
            $this->message=$data['message'];
        }
        if(array_key_exists('resident_id',$data)){
            $this->resident_id=$data['resident_id'];
        }if(array_key_exists('manager_id',$data)){
            $this->manager_id=$data['manager_id'];
        }
    }

    public function send(){
        $sql="insert into manager_message(manager_message,manager_id,resident_id) values(:manager_message,:manager_id,:resident_id)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_message',$this->message);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->bindValue(':resident_id',$this->resident_id);
        if($stmt->execute()){
            Session::init();
            Session::set("messagesend","<div class='alert alert-success'>Message sent!!</div>");
            header('location:view.php');
        }
    }

    public function getAllmessage($residentid){
        $sql="select manager_message from manager_message mg,resident r where r.resident_id=mg.resident_id and r.resident_id='$residentid'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function total($residentid){
        $sql="select count('message_no') as 'total' from manager_message mg,resident r where r.resident_id=mg.resident_id and r.resident_id='$residentid'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }



}