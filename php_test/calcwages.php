<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

// $employeeid=$_POST['id'];
// $ename=$_POST['name'];
// $mobile=$_POST['mobile'];


$sql="SELECT * FROM transaction where tid='$data->tid' ";
$result1=$conn->query($sql);
    
if ($result1 ->num_rows > 0) {
    // output data of each row
    while($row = $result1 -> fetch_assoc()) {
        echo json_encode(['status' => 'success','msg'=>'added!']);

        }}
        else
        {
            echo json_encode(['status' => 'failed','msg'=>'failed!']);
        }


