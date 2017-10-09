<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/3/2017
 * Time: 2:45 PM
 */

namespace App;


class Helper
{

    public function deleteImage($table,$uniqueid){
        $sql="select image from $table where uniqueid=:uniqueid";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':uniqueid',$uniqueid);
        $stmt->execute();
        $image_name=$stmt->fetch(\PDO::FETCH_ASSOC);
        unlink("../../../../../../".$image_name['image']);
    }


    public function getPreviousImage($uniqueid){
        $sql="select image from manager where uniqueid='$uniqueid'";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function uploadImage($folder){
        $_POST['image']=$_FILES['image']['name'];
        $filelocation=$_FILES['image']['tmp_name'];
        $div=explode('.',$_POST['image']);
        $fileExtension=strtolower(end($div));
        $uniqueName=substr(md5(time()), 0, 10).'.'.$fileExtension;
        $uploaded_image = "images/".$folder."/".$uniqueName;
        $_POST['image']=$uploaded_image;
        move_uploaded_file($filelocation,"../../../../../../".$uploaded_image);
        return $_POST['image'];
    }

}