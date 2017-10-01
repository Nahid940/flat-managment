<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 9/29/2017
 * Time: 12:20 PM
 */
namespace App\admin\owner;
use App\DBConnection;
use App\Session;

class Owner
{
    public function __construct()
    {

    }

    private $owner_email;
    private $password;

    public function set($data=array()){
        if(array_key_exists('owner_email',$data)){
            $this->owner_email=$data['owner_email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
    }

    public function OwnerLogin(){
        $sql="select * from owner where owner_email=:email";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':email',$this->owner_email);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch(\PDO::FETCH_OBJ);
                if($this->owner_email==$res->owner_email && $this->password==$res->password){
                    if($res->timestamp>time()){
                        Session::init();
                        Session::set('time',"<div class='alert alert-default colorOrange'>Account disabled !! try sometime later !!</div>");
                        header('location:login.php');
                    }else{
                        $sql="update owner set timestamp=0,attempt=0 where owner_email=:owner_email and password=:password";
                        $stmt=DBConnection::myQuery($sql);
                        $stmt->bindValue(':owner_email',$this->owner_email);
                        $stmt->bindValue(':password',$this->password);
                        $stmt->execute();
                        Session::init();
                        Session::set('login',true);
                        Session::set('ownername',$res->name);
                        Session::set('owner_email',$this->owner_email);
                        header('location:index.php');
                    }
                }else{
                    $res->attempt+=1;
                    $sql="update owner set attempt=:attempt where owner_email=:owner_email";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':attempt',$res->attempt);
                    $stmt->bindValue(':owner_email',$this->owner_email);
                    $stmt->execute();
                    Session::init();
                    Session::set('login-failure',"<div class='alert alert-default colorOrange'>Invalid login</div>");
                    header('location:login.php');
                    if($res->attempt>3){
                        $time=time()+60*5;
                        $sql="update owner set timestamp=$time where owner_email=:owner_email";
                        $stmt=DBConnection::myQuery($sql);
                        $stmt->bindValue(':owner_email',$this->owner_email);
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
}