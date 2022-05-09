<?php



$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn=new mysqli($servername, $username, $password,'test');
$employeeid=$_POST['employeeid'];
$date = date('Y-m-d', strtotime($_POST['date']));
   
$sql = "INSERT INTO attendance (employeeid,date) VALUES ('$employeeid','$date')";  
$result=$conn->query($sql);

if ($result) {
    echo json_encode(['status' => 'success','msg'=>'added!']);
  } else {
    echo json_encode(['status' => 'failed','msg'=>'sorry!']);}

