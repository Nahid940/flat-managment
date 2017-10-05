<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 10:00 PM
 */

namespace App\resident;
use App\DBConnection;
use App\Session;


class residents
{

    private $resident_id;
    private $name;
    private $age;
    private $phn;
    private $nid;
    private $email;
    private $attempt=0;
    private $timestamp=0;
    private $password;
    private $image=null;
    private $uniqueid;


    public function set($data=array()){
        if(array_key_exists('resident_id',$data)){
            $this->resident_id=$data['resident_id'];
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



    public function insertNewResidents(){
        $sql="select resident_id from resident where resident_id=:resident_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':resident_id',$this->resident_id);
        $stmt->execute();
        if($stmt->rowCount()>0){
            Session::init();
            Session::set('residentExist', "<div class='alert alert-danger'>Data already exist !!</div>");
            header('location:Addresidents.php');
        }else {

            $sql = "insert into resident (resident_id,name,age,phn,nid,email,attempt,timestamp,password,image,uniqueid) values(:resident_id,:name,:age,:phn,:nid,:email,:attempt,:timestamp,:password,:image,:uniqueid)";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':resident_id', $this->resident_id);
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
                Session::set('newResidentInsert', "<div class='alert alert-success'>New resident info added !!</div>");
                header('location:view.php');
            }
        }
    }


    public function selectAllResident(){
        $sql="select name,resident_id from resident";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectTotalResident(){
        $sql="select * from resident";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}