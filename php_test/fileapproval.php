<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

$sql="INSERT INTO loan(employeeid,ename,mobile) SELECT employeeid,ename,mobile FROM file WHERE id='$data->file_id' ";
$result=$conn->query($sql);
if ($result === TRUE) {
    echo "New record created successfully";
}