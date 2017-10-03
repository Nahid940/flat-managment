<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 9:00 PM
 */

namespace App\flats;
use App\DBConnection;

class Flat
{

    private $flat_no;
    private $floor_no;
    private $booked='no';

    public function set($data){
        if(array_key_exists('flat_no',$data)){
            $this->flat_no=$data['flat_no'];
        }
        if(array_key_exists('floor_no',$data)){
            $this->floor_no=$data['floor_no'];
        }
    }

    public function selectAllAvaliableFlat(){
        $sql="select * from flats where booked='no'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}