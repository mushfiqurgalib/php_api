<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');


$id=$data->id;
if($id)
{
    

$query="DELETE FROM users  WHERE id='$_GET[id]' ";}
$result=mysqli_query($conn,$query);
if($result){
    $response[] = array('status'=>1);
  }else{
    $response[] = array('status'=>0);
  }
  echo json_encode($response);