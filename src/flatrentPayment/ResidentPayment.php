<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/4/2017
 * Time: 11:58 PM
 */
namespace App\flatrentPayment;
use App\DBConnection;
use App\Session;

class ResidentPayment
{

    private $resident_id;
    private $flat_rent;
    private $electricity_bill;
    private $other_bill;
    private $date;
    private $month;

    public function set($data=array()){
        if(array_key_exists('resident_id',$data)){
            $this->resident_id=$data['resident_id'];
        }
        if(array_key_exists('flat_rent',$data)){
            $this->flat_rent=$data['flat_rent'];
        }
        if(array_key_exists('electricity_bill',$data)){
            $this->electricity_bill=$data['electricity_bill'];
        }
        if(array_key_exists('other_bill',$data)){
            $this->other_bill=$data['other_bill'];
        }

        if(array_key_exists('date',$data)){
            $this->date=$data['date'];
        }
        if(array_key_exists('month',$data)){
            $this->month=$data['month'];
        }
    }

    public function insertResidentPeyment(){
        $sql="select * from resident_payment where resident_id=:resident_id and month=:month";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':resident_id',$this->resident_id);
        $stmt->bindValue(':month',$this->month);
        $stmt->execute();
        if($stmt->rowCount()>0){
            Session::init();
            Session::set("paymentCompeltealready","<div class='alert alert-danger'>Payment already complete !!</div>");
            header('location:payment.php');
        }else {


            $datetime=strtotime(date("Y/m/d"));
            $year=date('Y',$datetime);

            $sql = "insert into resident_payment(resident_id,date,month,year,flat_rent,electricity_bill,other_bill) values(:resident_id,:date,:month,:year,:flat_rent,:electricity_bill,:other_bill)";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':resident_id', $this->resident_id);
            $stmt->bindValue(':date', $this->date);
            $stmt->bindValue(':month', $this->month);
            $stmt->bindValue(':year', $year);
            $stmt->bindValue(':flat_rent', $this->flat_rent);
            $stmt->bindValue(':electricity_bill', $this->electricity_bill);
            $stmt->bindValue(':other_bill', $this->other_bill);
            if ($stmt->execute()) {
                Session::init();
                Session::set('resPaymentCOmplete', "<div class='alert alert-success'>Data recorded !</div>");
                header('location:payment.php');
            }
        }
    }


    public function totalPaymentForThisMonth(){
        $sql="select count(resident_id) as 'total' from resident_payment where month=:month and year=:year";
        $stmt=DBConnection::myQuery($sql);
        $datetime=strtotime(date("Y/m/d"));
        $month=date('F',$datetime);
        $year=date('Y',$datetime);
        $stmt->bindValue(':month',$month);
        $stmt->bindValue(':year',$year);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getPaymentListMonthly(){
        $sql="select name,date,phn,email,flat_no,flat_rent,electricity_bill,other_bill, sum(flat_rent+electricity_bill+other_bill) as 'total' from resident r,residentflat rf, resident_payment rp where
        r.resident_id=rf.resident_id and r.resident_id=rp.resident_id group by(payment_no) desc";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function PaymentComplete(){
        $datetime=strtotime(date("Y/m/d"));
        $month=date('F',$datetime);
        $year=date('Y',$datetime);
        $sql="select resident_id from resident_payment where month='$month' and year='$year' and resident_id=:resident_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':resident_id',Session::get('resident_id'));
        $stmt->execute();
        if($stmt->rowCount()==1){
            return "<div class='alert-success' style='height: 50px;border-radius: 5px;padding: 15px'>Thank you. Your payment is complete for this month !!</div>";
        }
    }




}