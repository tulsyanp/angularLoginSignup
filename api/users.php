<?php
require_once 'dbConnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
	$sql = "SELECT id,email FROM user";
	$result = mysqli_query($conn,$sql);
	$response = array();
	while($row = mysqli_fetch_assoc ($result)) {
		$response[] = array("id" => $row['id'], "email" => $row['email']);
	}

  	echo json_encode($response);
}

?>