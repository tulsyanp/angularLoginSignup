<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['email']);

$response = array();
$response["status"] = "info";
$response["message"] = "Logged out successfully";

echo json_encode($response);
?>