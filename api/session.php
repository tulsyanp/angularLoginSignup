<?php
session_start();

$response = array();

$response["id"] = $_SESSION['id'];
$response["email"] = $_SESSION['email'];

echo json_encode($response);

?>