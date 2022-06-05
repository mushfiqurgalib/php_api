<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn=new mysqli($servername, $username, $password,'test');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // else
  // {echo "success";}