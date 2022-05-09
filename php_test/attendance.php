<?php



$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn=new mysqli($servername, $username, $password,'test');


  $sql = "SELECT COUNT(*) as 'att' FROM attendance where employeeid='22345' AND status='0' AND MONTH(date)='5' ";
   
    
  $result=$conn->query($sql);

      // output data of each row
      $row = mysqli_fetch_assoc($result); 
          $html=$row['att'];
          echo $html;
          
    
 