<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/7/2017
 * Time: 8:41 PM
 */

namespace App\manager;


use App\DBConnection;
use App\Session;

class Notice
{
    private $notice;
    private $date;
    private $manager_id;
    private $owner_email;

    public function set($data){
        if(array_key_exists('notice',$data)){
            $this->date=$data['date'];
        }
        if(array_key_exists('date',$data)){
            $this->notice=$data['notice'];
        }
        if(array_key_exists('manager_id',$data)){
            $this->manager_id=$data['manager_id'];
        }

        if(array_key_exists('owner_email',$data)){
            $this->owner_email=$data['owner_email'];
        }
    }

    public function insertNoticeByOwner(){
        $sql="insert into notice (owner_email,date,notice)VALUES (:owner_email,:date,:notice)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':owner_email',$this->owner_email);
        $stmt->bindValue(':date',$this->date);
        $stmt->bindValue(':notice',$this->notice);
        if($stmt->execute()){
            Session::init();
            Session::set("ownerNotice","<div class='alert alert-success'>Notice posted !!</div>");
            header('location:create.php');
        }
    }

    public function insertNoticeByManager(){
        $sql="insert into notice (manager_id,date,notice)VALUES (:manager_id,:date,:notice)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->bindValue(':date',$this->date);
        $stmt->bindValue(':notice',$this->notice);
        if($stmt->execute()){
            Session::init();
            Session::set("managerNotice","<div class='alert alert-success'>Notice posted !!</div>");
            header('location:create.php');
        }
    }

    public function getAllnotice(){
        $sql="select name,notice,date from notice n, manager m where m.manager_id=n.manager_id order by date desc";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            return 0;
        }
    }

    public function getAllnoticeFromOwner(){
        $sql="select name,notice,date from notice n, owner o where o.owner_email=n.owner_email order by date desc";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }else{
            return 0;
        }
    }

    public function newNotice(){
        $sql="select count(notice_no) as 'total' from notice where date=CURDATE()-6 or date=curdate()";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}