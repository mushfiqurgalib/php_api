<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

$url = "http://66.45.237.70/api.php";
    
        $sql="SELECT * FROM registration WHERE id='$data->id' AND name='$data->name' ";
    
        $result1=$conn->query($sql);
    
        if ($result1 ->num_rows > 0) {
            // output data of each row
            while($row = $result1 -> fetch_assoc()) {
              $number= $row['mobile'];
              $token=$row['token'];
              

              $text="Your one time pass is".'$token'."!";
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
echo $sendstatus;

            }
          } else {
            echo "wrong";
          }