<?php
require_once 'dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
      
	$email = $request->email;
	$password = $request->password;
	  
	$sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);
	$response = array();
	  
  	if($count == 1) {
    	$response['status'] = "success";
    	$response['message'] = 'Logged in successfully.';
    	$response['email'] = $row['email'];
    	$response['id'] = $row['id'];
    	if (!isset($_SESSION)) {
        	session_start();
    	}
    	$_SESSION['id'] = $row['id'];
    	$_SESSION['email'] = $row['email'];
  	} else {
       	$response['status'] = "error";
       	$response['message'] = 'Login failed. Incorrect credentials';
    }
    echo json_encode($response);
}


?>