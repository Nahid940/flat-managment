<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/5/2017
 * Time: 12:06 PM
 */

namespace App\manager;


use App\DBConnection;
use App\Session;

class ManagerCostList
{
    private $manager_id;
    private $plumber_cost;
    private $electrician_bill;
    private $tool_cost;
    private $carpenter_cost;
    private $masonry_cost;
    private $others_cost;
    private $date;
    private $month;
    private $year;


    public function set($data=array())
    {
        if (array_key_exists('manager_id', $data)) {
            $this->manager_id = $data['manager_id'];
        }
        if (array_key_exists('date', $data)) {
            $this->date = $data['date'];
        }
        if (array_key_exists('month', $data)) {
            $this->month = $data['month'];
        }
        if (array_key_exists('year', $data)) {
            $this->year = $data['year'];
        }
        if (array_key_exists('plumber_cost', $data)) {
            $this->plumber_cost = $data['plumber_cost'];
        }
        if (array_key_exists('electrician_bill', $data)) {
            $this->electrician_bill = $data['electrician_bill'];
        }
        if (array_key_exists('tool_cost', $data)) {
            $this->tool_cost = $data['tool_cost'];
        }
        if (array_key_exists('carpenter_cost', $data)) {
            $this->carpenter_cost = $data['carpenter_cost'];
        }
        if (array_key_exists('masonry_cost', $data)) {
            $this->masonry_cost = $data['masonry_cost'];
        }
        if (array_key_exists('others_cost', $data)) {
            $this->others_cost = $data['others_cost'];
        }
    }


    public function ManagerExpenditure(){
        $sql="insert into manager_expenditure (manager_id,date,month,year,plumber_cost,electrician_bill,tool_cost,carpenter_cost,masonry_cost,others_cost) values(:manager_id,:date,:month,:year,:plumber_cost,:electrician_bill,:tool_cost,:carpenter_cost,:masonry_cost,:others_cost)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id',$this->manager_id);
        $stmt->bindValue(':date',$this->date);
        $stmt->bindValue(':month',$this->month);
        $stmt->bindValue(':year',$this->year);
        $stmt->bindValue(':plumber_cost',$this->plumber_cost);
        $stmt->bindValue(':electrician_bill',$this->electrician_bill);
        $stmt->bindValue(':tool_cost',$this->tool_cost);
        $stmt->bindValue(':carpenter_cost',$this->carpenter_cost);
        $stmt->bindValue(':masonry_cost',$this->masonry_cost);
        $stmt->bindValue(':others_cost',$this->others_cost);
        if($stmt->execute()){
            Session::init();
            Session::set("costAdded","<div class='alert alert-success'>Cost info added !!</div>");
            header('location:AddMaintenanceCost.php');
        }
    }

    public function getAllExpenditureList(){
        $sql="select date,plumber_cost,electrician_bill,tool_cost,carpenter_cost,masonry_cost,others_cost,
              sum(plumber_cost+electrician_bill+tool_cost+carpenter_cost+masonry_cost+others_cost) as 'Total'
              from manager_expenditure where manager_id=:manager_id group by expenditure_no";
        $stmt=DBConnection::myQuery($sql);
        $stmt->bindValue(':manager_id','manager01');
        $stmt->execute();
        return$stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function TotalCost(){
        $sql="select sum(plumber_cost+Electrician_bill+tool_cost+carpenter_cost+masonry_cost+others_cost) as 'Totalcost' from manager_expenditure";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        $res=$stmt->fetchColumn();
        return $res;
    }

    public function costListMonthly(){
        $sql="select Month,year(date) as 'Year',sum(plumber_cost+electrician_bill+tool_cost+carpenter_cost+masonry_cost+others_cost) as 'Total' from manager_expenditure group by Month";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        $res=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $res;
    }
    public function costListOfLastMonth(){
        $datetime=strtotime(date('Y-m-d'));
        $month=(date('F',$datetime));
        $sql="select month,year,sum(plumber_cost+electrician_bill+tool_cost+carpenter_cost+masonry_cost+others_cost) as 'Total' from manager_expenditure where monthname(date)='$month' group by month(date),year(date)";
        $stmt=DBConnection::myQuery($sql);
        $stmt->execute();
        $res=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $res;
    }



}