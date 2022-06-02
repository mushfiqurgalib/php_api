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

$employeeid='$data->id';
$month='$data->month';
$sql="SELECT COUNT(*) as 'att' FROM attendance where employeeid='$data->id' AND status='1' AND MONTH(date)='$data->month' ";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
$wage=$row['att']*300;

echo $wage;

if($transactionid){
$sql8="INSERT INTO transaction(tid,date,employeeid,amount,type) VALUES ('$data->tid',CURRENT_TIME(),'$data->id','$wage','wages') ";
}if (mysqli_query($conn, $sql8)) {
    echo "File uploaded successfully";
}
 else {
echo "Failed to upload file.";
}