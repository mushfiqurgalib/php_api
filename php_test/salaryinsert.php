
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
$employeeid=$data->id;
$basic=$data->basic;
$rent=$data->rent;
$medical=$data->medical;
$tax=$data->tax;
if($employeeid)
{
$sql="INSERT INTO salary(employeeid,basic,rent,medical,tax) VALUES ('$employeeid','$basic','$rent','$medical','$tax') ";}
$result=$conn->query($sql);
if($result){
    $response[] = array('status'=>1);
}else{
    $response[] = array('status'=>0);
}
echo json_encode($response);
