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
// $url = "http://66.45.237.70/api.php";
// $month1=date("F", strtotime(date("Y") ."-". '$data->month' ."-01"));
$employeeid='$data->employeeid';
$month='$data->month';
$sql="SELECT COUNT(*) as 'att' FROM attendance where employeeid='$data->employeeid' AND status='1' AND MONTH(date)='$data->month' ";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
$wage=$row['att']*300;

echo json_encode($wage);