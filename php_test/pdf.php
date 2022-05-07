<?php

$html+'';

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn=new mysqli($servername, $username, $password,'test');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else
  {echo "success";}

    $sql = "SELECT id,name FROM registration";
   
    
    $result=$conn->query($sql);

    if ($result ->num_rows > 0) {
        // output data of each row
        while($row = $result -> fetch_assoc()){ 
            $html.="id: ".$row['id']."-Name : ".$row['name'];
            echo $html;
            
        }

    }
    else{
        $html="not found";
    }
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  
    ?>
