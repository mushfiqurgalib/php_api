<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');



if($data->id=='')
{
    echo json_encode(['status'=>'no id']);
}
elseif($data->name=='')
{
    echo json_encode(['status'=>'no name']);
}

elseif($data->mobile=='')
{
    echo json_encode(['status'=>'no mobile']);
}
elseif($data->password=='')
{
    echo json_encode(['status'=>'no password']);
}
else{
    $sql = "INSERT INTO  registration (id,name,mobile,password) VALUES ('$data->id', '$data->name', '$data->mobile','$data->password')";
    $run=mysqli_query($conn,$sql);
if ($run) {
    echo json_encode(['status' => 'success','msg'=>'added!']);
  } else {
    echo json_encode(['status' => 'failed','msg'=>'sorry!']);
  }}
