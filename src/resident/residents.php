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
    private $fmember;
    private $age;
    private $phn;
    private $nid;
    private $email;
    private $attempt=0;
    private $timestamp=0;
    private $password;
    private $image=null;
    private $uniqueid;
    private $remember;
    private $flat_no;


    public function set($data=array()){
        if(array_key_exists('resident_id',$data)){
            $this->resident_id=$data['resident_id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('fmember',$data)){
            $this->fmember=$data['fmember'];
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

        if(array_key_exists('remember',$data)){
            $this->remember=$data['remember'];
        }
        if(array_key_exists('flat_no',$data)){
            $this->flat_no=$data['flat_no'];
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

            $sql = "insert into resident (resident_id,name,fmember,phn,nid,email,attempt,timestamp,password,image,uniqueid,created_at,deleted_at) values(:resident_id,:name,:fmember,:phn,:nid,:email,:attempt,:timestamp,:password,:image,:uniqueid,now(),'0000-00-00 00:00:00')";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':resident_id', $this->resident_id);
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':fmember', $this->fmember);
            $stmt->bindValue(':phn', $this->phn);
            $stmt->bindValue(':nid', $this->nid);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':attempt', $this->attempt);
            $stmt->bindValue(':timestamp', $this->timestamp);
            $stmt->bindValue(':password', $this->password);
            $stmt->bindValue(':image', $this->image);
            $stmt->bindValue(':uniqueid', $this->uniqueid);
            if ($stmt->execute()) {
                $sql="insert into residentflat(flat_no,resident_id)values(:flat_no,:resident_id)";
                $stmt=DBConnection::myQuery($sql);
                $stmt->bindValue(':flat_no',$this->flat_no);
                $stmt->bindValue(':resident_id',$this->resident_id);

                if( $stmt->execute()){
                    $sql="update flats set booked='yes' where flat_no=:flat_no";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':flat_no',$this->flat_no);
                    $stmt->execute();
                }

                Session::init();
                Session::set('newResidentInsert', "<div class='alert alert-success'>New resident info added !!</div>");
                header('location:Message.php');
            }
        }
    }


    public function selectAllResident($limit){
        $sql="select r.resident_id,name,uniqueid,phn,email,nid,flat_no,image from resident r , residentflat rf where r.resident_id=rf.resident_id and deleted_at='0000-00-00 00:00:00' limit $limit,5";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectAllResidentForPayment(){
        $sql="select r.resident_id,name,uniqueid,phn,email,nid,flat_no,image from resident r , residentflat rf where r.resident_id=rf.resident_id and deleted_at='0000-00-00 00:00:00'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }




    public function trashData(){
        $sql="select r.resident_id,name,uniqueid,phn,email,nid,flat_no from resident r , residentflat rf where r.resident_id=rf.resident_id and deleted_at!='0000-00-00 00:00:00'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function temporary_Delete($uniqueid){
        $sql="update resident set deleted_at=now() where uniqueid='$uniqueid'";
        $stmt=DBConnection::myQuery($sql);
        if( $stmt->execute()){
            $sql=" update flats f, residentflat,resident set booked='no' where f.flat_no=residentflat.flat_no and residentflat.resident_id=resident.resident_id and resident.uniqueid='$uniqueid'";
            $stmt=DBConnection::myQuery($sql);
            $stmt->execute();
            Session::init();
            Session::set("tmpDelete","<div class='alert alert-danger'>Data moved to trash !!</div>");
            header('location:Message.php');
        }
    }

    public function permanent_Delete($uniqueid){
        $sql="delete from resident where uniqueid='$uniqueid'";
        $stmt=DBConnection::myQuery($sql);
        if( $stmt->execute()){
            Session::init();
            Session::set("permDelete","<div class='alert alert-danger'>Permanently deleted !!</div>");
            header('location:../trash.php');
        }
    }


    public function selectExistingResident($resident_id){
        $sql="select resident_id from resident where resident_id='$resident_id'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        if($stmt->rowCount()==0){
            return "Available";

        }else{
            return "ID already exist, try alternative...";
        }
    }


    public function selectTotalResident(){
        $sql="select * from resident";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function ResidentLogin(){

        $sql="select * from resident where resident_id=:resident_id or email=:resident_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':resident_id',$this->resident_id);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch(\PDO::FETCH_OBJ);
            if(($this->resident_id==$res->resident_id || $this->resident_id==$res->email) && $this->password==$res->password){
                if($res->timestamp>time()){
                    Session::init();
                    Session::set('resLogintime',"<div class='alert alert-default colorOrange'>Account disabled !! try sometime later !!</div>");
                    header('location:login.php');
                }else{
                    $sql="update resident set timestamp=0,attempt=0 where resident_id=:resident_id and password=:password";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':resident_id',$this->resident_id);
                    $stmt->bindValue(':password',$this->password);
                    $stmt->execute();
                    Session::init();
                    Session::set("login",true);
                    Session::set('name',$res->name);
                    Session::set('image',$res->image);
                    Session::set('resident_id',$this->resident_id);
                    header('location:index.php');

                    if(!empty($this->remember)){
                        setcookie('res_login',$this->resident_id,time()+(10 * 365 * 24 * 60 * 60));
                        setcookie('password',$this->password,time()+(10 * 365 * 24 * 60 * 60));
                    }else{
                        setcookie('res_login',$this->resident_id);
                        setcookie('password',$this->password);
                    }
                }
            }else{
                $res->attempt+=1;
                $sql="update resident set attempt=:attempt where resident_id=:resident_id";
                $stmt=DBConnection::myQuery($sql);
                $stmt->bindValue(':attempt',$res->attempt);
                $stmt->bindValue(':resident_id',$this->resident_id);
                $stmt->execute();
                Session::init();
                Session::set('res-login-failure',"<div class='alert alert-default colorOrange'>Invalid login</div>");
                header('location:login.php');
                if($res->attempt>3){
                    $time=time()+60*5;
                    $sql="update resident set timestamp=$time where resident_id=:resident_id";
                    $stmt=DBConnection::myQuery($sql);
                    $stmt->bindValue(':resident_id',$this->resident_id);
                    if($stmt->execute()){
                        Session::init();
                        Session::set("residentaccountBlocked","<div class='alert alert-default colorOrange'>Your account has been disabled please try again after 5 minutes!!</div>");
                    }
                }
            }
        }else{
            Session::init();
            Session::set('resident-login-failure',"<div class='alert alert-default colorOrange'>Invalid login</div>");
            header('location:login.php');
        }
    }

    public function totalMember(){
        $sql="select sum(fmember) as 'total' from resident where deleted_at='0000-00-00 00:00:00'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getParticularResidentInfo($residentid){
        $sql="select count(month) as 'totalmonth' from resident r,resident_payment rp where r.resident_id=rp.resident_id and r.resident_id='$residentid'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getparticularResInfo($residentid){
        $sql="select * from resident where resident_id='$residentid'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


}