<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
session_start();
error_reporting(0);

$stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND status = 1");
$stmt->bindParam(1, $_POST["username"]);
$stmt->execute();
$row = $stmt->fetch();

if (!empty($row)) {
  echo json_encode(
    array(
      "success" => true,
      "username" => $row['username']
    )
  );
}else{
  echo json_encode(
    array(
      "success" => false,
      "message" => '* Username or Password is incorrect * '
    )
  );
}
?>