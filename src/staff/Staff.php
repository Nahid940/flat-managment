<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:46 AM
 */
namespace App\staff;
use App\DBConnection;
use App\Session;

class Staff
{

    private $staff_id;
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
        if(array_key_exists('staff_id',$data)){
            $this->staff_id=$data['staff_id'];
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


    public function insertNewStaff(){
        $sql="select staff_id from staff where staff_id=:staff_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':staff_id',$this->staff_id);
        $stmt->execute();
        if($stmt->rowCount()>0){
            Session::init();
            Session::set('StaffExist', "<div class='alert alert-danger'>Data already exist !!</div>");
            header('location:create.php');
        }else {

            $sql = "insert into staff (staff_id,name,age,phn,nid,email,attempt,timestamp,password,image,uniqueid) values(:staff_id,:name,:age,:phn,:nid,:email,:attempt,:timestamp,:password,:image,:uniqueid)";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':staff_id', $this->staff_id);
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
                Session::set('newStaffInsert', "<div class='alert alert-success'>New manager info added !!</div>");
                header('location:view.php');
            }else{
                header('location:create.php');

            }
        }
    }

    public function getAllStaff(){
        $sql="select * from staff";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSingleStaff(){
        $sql="select * from staff where uniqueid=:uniqueid";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(":uniqueid",$this->uniqueid);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}