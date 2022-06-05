<?php


header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
session_start();

$data=json_decode(file_get_contents("php://input"));
include('db.php');



$sql = "UPDATE users SET password='$data->password' WHERE id='$data->id'";
$run=mysqli_query($conn,$sql);
if ($run) {
  $response[] = array('status'=>1);
  } else {
    $response[] = array('status'=>1);}
    echo json_encode($response);