<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 10:33 PM
 */
namespace App\ownermessage;
use App\DBConnection;
use App\Session;

class OwnerMessage
{

    private $message;
    private $resid;
    private $owner_email;
    private $checks='no';

    public function set($data){
        if(array_key_exists('message',$data)){
            $this->message=$data['message'];
        }
        if(array_key_exists('resid',$data)){
            $this->resid=$data['resid'];
        }
        if(array_key_exists('owner_email',$data)){
            $this->owner_email=$data['owner_email'];
        }

    }

    public function sendMessage(){
        $sql="insert into owner_message(owner_email,message,resident_id,checks)values(:owner_email,:message,:resident_id,:checks)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':owner_email',$this->owner_email);
        $stmt->bindValue(':message',$this->message);
        $stmt->bindValue(':resident_id',$this->resid);
        $stmt->bindValue(':checks',$this->checks);

        if($stmt->execute()){
            Session::init();
            Session::set('messageSend',"<div class='alert alert-success'>Message send !</div>");
            header('location:view.php');
        }
    }

    public function getAllmessage(){
//        Session::init();
        $sql="select message from owner_message where resident_id=:resident_id and checks='no'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue('resident_id',Session::get('resident_id'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function total(){
        $sql="select count(resident_id) as 'total' from owner_message where resident_id=:resident_id and checks='no'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue('resident_id',Session::get('resident_id'));
        $stmt->execute();
        return $stmt->fetchColumn();
    }


}