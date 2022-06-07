<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');

 $url = "http://66.45.237.70/api.php";
$data=json_decode(file_get_contents("php://input"));
include('db.php');
 $employeeid=$data->id;
$ename=$data->name;
$mobile=$data->mobile;
$amount=$data->amount;
if($employeeid){
$sql8="INSERT INTO loan(employeeid,ename,mobile,amount) VALUES ('$employeeid','$ename','$mobile','$amount') ";

}if (mysqli_query($conn, $sql8)) {
    $response[] = array('status'=>1);

    $text="Your loan application has been  approved!";
    //  echo $text;
    $sql9="SELECT mobile FROM users WHERE id='$data->id'";
    $result1=$conn->query($sql9);
    
    // if ($result1 ->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result1 -> fetch_assoc()) {
          $number= $data->mobile;
              // echo $text;
                $data= array(
                'username'=>"G4L18",
                'password'=>"59FZRDXM",
                'number'=>"$number",
                'message'=>"$text"
                );


            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];
            //  echo $sendstatus;
    }
 else {
    $response[] = array('status'=>0);
}
echo json_encode($response);
