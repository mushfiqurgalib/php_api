<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));

include('db.php');
 $amount='$data->amount';
$sql="INSERT INTO loan(amount) VALUES('$data->amount')  where employeeid='$data->employeeid'";
$result=$conn->query($sql);
if ($result === TRUE) {
    echo "New record created successfully";
}