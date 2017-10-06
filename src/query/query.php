<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:08 PM
 */
namespace App\query;
use App\DBConnection;
use App\Session;

class query
{

    private $query_no;
    private $resident_id;
    private $query;
    private $date;
    private $checks='no';

    public function set($data){
        if(array_key_exists('resident_id',$data)){
            $this->resident_id=$data['resident_id'];
        } if(array_key_exists('query',$data)){
            $this->query=$data['query'];
        }if(array_key_exists('date',$data)){
            $this->date=$data['date'];
        }if(array_key_exists('date',$data)){
            $this->date=$data['date'];
        }
    }


    public function selectAllUnseenQuery(){
        $sql="select r.resident_id,name,query,query_no,date,f.flat_no,floor_no from resident r, flats f, ResidentFlat rf, resident_query rq where r.resident_id=rf.resident_id and f.flat_no=rf.flat_no and r.resident_id=rq.resident_id and rq.checks='no'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function newQuery(){
        $sql="select checks from resident_query where checks='no'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function checkQuery($data){
        $sql="update resident_query set checks='yes' where query_no=$data";
        $stmt=DBConnection::myQuery($sql);
        if(!$stmt->execute()){
            echo 1;
        }
    }

    public function sendQuery(){
        $sql="insert into resident_query(resident_id,query,date,checks)VALUES (:resident_id,:query,:date,:checks)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':resident_id',$this->resident_id);
        $stmt->bindValue(':query',$this->query);
        $stmt->bindValue(':date',$this->date);
        $stmt->bindValue(':checks',$this->checks);
        if($stmt->execute()){
            Session::init();
            Session::set('querySend',"<div class='alert alert-success'>Query sent!</div>");
            header('location:query.php');
        }
    }

}