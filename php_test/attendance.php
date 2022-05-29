<html>
<head>
<title>...</title>
<style type="text/css">
/* table {
margin: 8px;
} */

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #000;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
</style>
</head>
<body>
<?php



header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

  $transactionid= rand(200000,299999);
  $sql = "SELECT COUNT(*) as 'att' FROM attendance where employeeid='$_GET[id]' AND status='1' AND MONTH(date)='$_GET[month]' ";
  $result=$conn->query($sql);
  $html="";
  $html.="<h1 align='center'> Payslip  </h1>";
  $sql1="SELECT id FROM users where id='$_GET[id]' ";
  $result1=$conn->query($sql1);
  $row1=mysqli_fetch_assoc($result1);
  $html.="<div ><p align='left'> Employee ID:".$row1['id'];
  
  $sql2="SELECT name FROM users WHERE id='$_GET[id]' ";
  $result2=$conn->query($sql2);
  $row2=mysqli_fetch_assoc($result2);
 
   $html.="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Month:".date("F", strtotime(date("Y") ."-". $_GET['month'] ."-01"));
   
  $html.="</p>";
  $html.="<p> Name:".$row2['name'];
 $html.="</p> ";
 $html.="<p> Transaction ID: ";
 $html.=$transactionid;
 $row = mysqli_fetch_assoc($result); 
   
 $html.="<p> Attendance :" .$row['att'];
 
  $html.=
  "<table border='1' width='300' cellspacing='0'>

<tr>

<th>Id</th>

<th>name</th> </tr>";
$html.=
 "</td>
 </table>";
      // output data of each row
   


        // // $html.=  "<td>" .$row['att'] "</td>"
        // //   "</table>";
        //   // echo $html;
            require_once __DIR__ . '/vendor/autoload.php';
          $mpdf = new \Mpdf\Mpdf();
          $mpdf->WriteHTML($html);
          $mpdf->Output();
          ?>
          </body>
          </html>
         
  