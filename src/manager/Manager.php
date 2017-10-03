<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 9/30/2017
 * Time: 1:19 PM
 */
namespace App\manager;
use App\DBConnection;
use App\Session;
class Manager
{
    private $manager_id;
    private $name;
    private $age;
    private $phn;
    private $nid;
    private $email;
    private $attempt=0;
    private $timestamp=0;
    private $password;
    private $image;
    private $uniqueid;

    public function set($data=array()){
        if(array_key_exists('manager_id',$data)){
            $this->manager_id=$data['manager_id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('age',$data)){
            $this->age=$data['age'];
        }

        if(array_key_exists('phn',$data)){
            $this->phn=$data['phn'];
        }

        if(array_key_exists('nid',$data)){
            $this->nid=$data['nid'];
        }

        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        if(array_key_exists('image',$data)){
            $this->image=$data['image'];
        }
        if(array_key_exists('uniqueid',$data)){
            $this->uniqueid=$data['uniqueid'];
        }
    }

    public function insertNewManager(){
        $sql="select manager_id from manager where manager_id=:manager_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->execute();
        if($stmt->rowCount()>0){
            Session::init();
            Session::set('managerExist', "<div class='alert alert-danger'>Data already exist !!</div>");
            header('location:Addinfo.php');
        }else {

            $sql = "insert into manager (manager_id,name,age,phn,nid,email,attempt,timestamp,password,image,uniqueid) values(:manager_id,:name,:age,:phn,:nid,:email,:attempt,:timestamp,:password,:image,:uniqueid)";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':manager_id', $this->manager_id);
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':age', $this->age);
            $stmt->bindValue(':phn', $this->phn);
            $stmt->bindValue(':nid', $this->nid);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':attempt', $this->attempt);
            $stmt->bindValue(':timestamp', $this->timestamp);
            $stmt->bindValue(':password', $this->password);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':uniqueid', $this->uniqueid);
            if ($stmt->execute()) {
                Session::init();
                Session::set('newManagerInsert', "<div class='alert alert-success'>New manager info added !!</div>");
                header('location:view.php');
            }
        }
    }


    public function ManagerLogin(){
        $sql="select * from manager where manager_id=:manager_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch(\PDO::FETCH_OBJ);
            if($this->manager_id==$res->manager_id && $this->password==$res->password){
                if($res->timestamp>time()){
                    Session::init();
                    Session::set('time',"<div class='alert alert-default colorOrange'>Account disabled !! try sometime later !!</div>");
                    header('location:login.php');
                }else{
                    $sql="update manager set timestamp=0,attempt=0 where manager_id=:manager_id and password=:password";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':manager_id',$this->manager_id);
                    $stmt->bindValue(':password',$this->password);
                    $stmt->execute();
                    Session::init();
                    Session::set("login",true);
                    Session::set('managername',$res->name);
                    Session::set('manager_id',$this->manager_id);
                    header('location:index.php');
                }
            }else{
                $res->attempt+=1;
                $sql="update manager set attempt=:attempt where manager_id=:manager_id";
                $stmt=DBConnection::myQuery($sql);
                $stmt->bindValue(':attempt',$res->attempt);
                $stmt->bindValue(':manager_id',$this->manager_id);
                $stmt->execute();
                Session::init();
                Session::set('login-failure',"<div class='alert alert-default colorOrange'>Invalid login</div>");
                header('location:login.php');
                if($res->attempt>3){
                    $time=time()+60*5;
                    $sql="update manager set timestamp=$time where manager_id=:manager_id";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':manager_id',$this->manager_id);
                    if($stmt->execute()){
                        Session::init();
                        Session::set("accountBlocked","<div class='alert alert-default colorOrange'>Your account has been disabled please try again after 5 minutes!!</div>");
                    }
                }
            }
        }else{
            Session::init();
            Session::set('login-failure',"<div class='alert alert-default colorOrange'>Invalid login</div>");
            header('location:login.php');
        }
    }

    public function getAllmanagers(){
        $sql="select * from manager";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getTotalManager(){
        $sql="select * from manager";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }



    public function checkSameManagerID(){
        $sql="select manager_id from manager where manager_id=:manager_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return  "User Name Already Exist";
        }else{
            return "Available";
        }
    }

}