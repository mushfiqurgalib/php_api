<?php


header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
session_start();

$data=json_decode(file_get_contents("php://input"));
include('db.php');

$sessionid= $_SESSION["sesid"];

$sql = "INSERT INTO users (password)
VALUES ('$data->password') WHERE id='$sessionid'";
$run=mysqli_query($conn,$sql);