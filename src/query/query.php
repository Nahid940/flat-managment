<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 11:08 PM
 */
namespace App\query;
use App\DBConnection;

class query
{

    private $query_no;
    private $resident_id;

    public function set($data){
        if(array_key_exists('query_no',$data)){
            $this->query_no=$data['query_no'];
        }
    }


    public function selectAllUnseenQuery(){
        $sql="select name,query,query_no,date,f.flat_no,floor_no from resident r, flats f, ResidentFlat rf, resident_query rq where r.resident_id=rf.resident_id and f.flat_no=rf.flat_no and r.resident_id=rq.resident_id and rq.checks='no'";
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

    public function checkQuery(){
        $sql="update resident_query set checks='yes' wher query_no=:query_no";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(":query_no",$this->query_no);
        if($stmt->execute()){
            return 1;
        }
    }

}