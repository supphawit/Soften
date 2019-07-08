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

$response = array();

if($_POST['password'] != $_POST['confirm_password']){
  $response["pass"] = array(
    "success" => false,
    "message" => "รหัสผ่านไม่ตรงกัน"
  );
  echo json_encode($response);
}else{
  
    $updatePass = $pdo->prepare("UPDATE members SET password = ? WHERE username = ?");
    $updatePass->bindParam(1, $_POST["password"]);
    $updatePass->bindParam(2, $_POST["username"]);
    $updatePass->execute();

    $response["pass"] = array(
      "success" => true
    );
    echo json_encode($response);
}
?>