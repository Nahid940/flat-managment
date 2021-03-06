<?php

/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 10:36 AM
 */
namespace App\staffPayment;
use App\DBConnection;
use App\Session;

class StaffPayment extends \App\staff\Staff
{

    private $amount;
    private $date;
    private $month;
    private $year;

    public function set($data=array())
    {
        if (array_key_exists('staff_id', $data)) {
            $this->staff_id=$data['staff_id'];
        }
        if (array_key_exists('amount', $data)) {
            $this->amount=$data['amount'];
        }
        if (array_key_exists('date', $data)) {
            $this->date=$data['date'];
        }
        if (array_key_exists('month', $data)) {
            $this->month=$data['month'];
        }
        if (array_key_exists('year', $data)) {
            $this->year=$data['year'];
        }
    }


    public function staffSalary(){
        $sql="select * from staff_salary where staff_id=:staff_id and month=:month and year=:year";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':staff_id',$this->staff_id);
        $stmt->bindValue(':month',$this->month);
        $stmt->bindValue(':year',$this->year);
        $stmt->execute();
        if($stmt->rowCount()>0){
            Session::init();
            Session::set("StaffsalaryCompeltealready","<div class='alert alert-danger'>Salary already given !!</div>");
            header('location:salary.php');
        }else {


            $sql = "insert into staff_salary(staff_id,amount,month,year,date) values(:staff_id,:amount,:month,:year,:date)";
            $stmt = DBConnection::myQuery($sql);
            $stmt->bindValue(':staff_id', $this->staff_id);
            $stmt->bindValue(':amount', $this->amount);
            $stmt->bindValue(':month', $this->month);
            $stmt->bindValue(':year', $this->year);
            $stmt->bindValue(':date', $this->date);

            if ($stmt->execute()) {
                Session::init();
                Session::set('StaffSalaryPayment', "<div class='alert alert-success'>Salary given!!</div>");
                header('location:salary.php');
            }
        }
    }

    public function completedStaffPayment(){
        $sql="select staff_id from staff_salary where month=:month and year=:year";
        $stmt=DBConnection::myQuery($sql);
        $datetime=strtotime(date("Y/m/d"));
        $month=date('F',$datetime);
        $year=date('Y',$datetime);
        $stmt->bindValue(':month',$month);
        $stmt->bindValue(':year',$year);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function StaffPaymentList(){
        $sql=" select name,date,amount,month,year from staff s left join staff_salary on s.staff_id=staff_salary.staff_id";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function TotalPayment(){
        $sql="select sum(amount) as 'Total' from staff_salary";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function StaffTotalPaymentLastMonth(){
        $sql="select month,year,sum(amount) as 'Total' from staff_salary group by month,year desc limit 1";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }



}