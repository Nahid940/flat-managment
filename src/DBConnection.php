<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 9/29/2017
 * Time: 12:19 PM
 */
namespace App;
use PDO;
class DBConnection
{

    private static $pdo;
    public static function myDb(){
        if(!isset(self::$pdo)){
            try{
                self::$pdo=new PDO('mysql:host=localhost;dbname=bitmproject',"root","");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exp){
                return $exp->getMessage();
            }
        }
        return self::$pdo;
    }


    public static function myQuery($sql){
        return self::myDb()->prepare($sql);
    }


}