<?php



header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');


  $sql = "SELECT COUNT(*) as 'att' FROM attendance where employeeid='$data->employeeid' AND status='1' AND MONTH(date)='$data->month' ";
   
    
  $result=$conn->query($sql);

      // output data of each row
      $row = mysqli_fetch_assoc($result); 
          $html=$row['att'];
          echo $html;
          
          require_once __DIR__ . '/vendor/autoload.php';
          $mpdf = new \Mpdf\Mpdf();
          $mpdf->WriteHTML($html);
          $mpdf->Output();
 
