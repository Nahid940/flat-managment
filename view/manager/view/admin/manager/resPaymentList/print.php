<?php
/**
 * Created by PhpStorm.
 * User: Nahid Islam
 * Date: 10/6/2017
 * Time: 11:03 PM
 */

include_once '../../../../../../vendor/autoload.php';
$resPayment=new \App\flatrentPayment\ResidentPayment();
$uniqueid=$_GET['uniqueid'];
$month =$_GET['month'];
$year =$_GET['year'];
$monthlyPayment=new \App\flatrentPayment\ResidentPayment();

$res=$monthlyPayment->getPaymentInfoMonthly($uniqueid,$month,$year);
$html="
<html>
<head>
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    padding: 15px;
    text-align: left;
}


</style>
</head>

<body>
<center><strong>Your monthly bill receipt</strong></center>
<table>
  <tr>
    <td>Name</td>
    <td>".$res['name']."</td>
    
  </tr>
  <tr>
    <td>Date</td>
    <td>".$res['date']."</td>
  </tr>
  <tr>
    <td>Flat no.</td>
    <td>".$res['flat_no']."</td>
  </tr>
  <tr>
    <td>Flat rent</td>
    <td>".$res['flat_rent']."</td>
  </tr>
  
   <tr>
    <td>Electricity bill</td>
    <td>".$res['electricity_bill']."</td>
  </tr>
  <tr>
    <td>Other bill</td>
    <td>".$res['other_bill']."</td>
  </tr>
  <tr>
    <td>Total bill</td>
    <td>".$res['total']."</td>
  </tr>
</table>
</body>
</html>
";

//<table style='border-collapse: collapse;
//    width: 80%;background-color: #ede4dc'>
//<tr style='text-align: center;border-bottom: 1px solid #ddd'><td>Name</td><td>\".$res['name'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Date</td><td>\".$res['date'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Flat no.</td><td>\".$res['flat_no'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Flat rent</td><td>\".$res['flat_rent'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Electricity bill</td><td>\".$res['electricity_bill'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Other bill</td><td>\".$res['other_bill'].\"</td></tr>
//<tr style='text-align: center;border-bottom: 1px solid #ddd''><td>Total amount</td><td>\".$res['total'].\"</td></tr>
//</table>\"


$domPdf=new \Dompdf\Dompdf();

$domPdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$domPdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$domPdf->render();

// Output the generated PDF to Browser
$domPdf->stream();