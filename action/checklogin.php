<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
session_start();
error_reporting(0);

$stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND password = ? AND status = 1");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();

if (!empty($row)) {
  $_SESSION["username"] = $row["username"];
  $_SESSION["flname"] = $row["flname"];
  $_SESSION['role'] = $row['role'];

  if($row['role'] == 'admin'){
    echo json_encode(
      array(
        "chapter" => 2
      )
    );
    
  }else if($row['role'] == 'member'){
    echo json_encode(
      array(
        "success" => true,
        "role" => "member"
      )
    );
  }
}else{
  echo json_encode(
    array(
      "success" => false,
      "message" => '* Username or Password is incorrect * '
    )
  );
  header("Refresh: 5;url=../index.php");
}
?>