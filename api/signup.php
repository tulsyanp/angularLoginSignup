<?php
require_once 'dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
      
	$email = $request->email;
	$password = $request->password;
	  
	$sql = "SELECT * from user where email='$email'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);
	$response = array();
	  
	if($count == 1) {
  	$response["status"] = "error";
    $response["message"] = "An user with the provided phone or email exists!";
	} else {
     	$sql1 = "INSERT INTO user (email,password) VALUES ('$email','$password')";
      $result1 = mysqli_query($conn,$sql1);
      $response["status"] = "success";
      $response["message"] = "User account created successfully";
  }
  echo json_encode($response);
}


?>