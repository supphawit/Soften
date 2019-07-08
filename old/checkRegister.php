<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
session_start();
error_reporting(0);

$fetchUser = $pdo->prepare("SELECT * FROM members Where username = ? ");
$fetchUser->bindParam(1, $_POST["username"]);
$fetchUser->execute();
$rowCheckuser = $fetchUser->fetch();

if(!isset($rowCheckuser['username'])){
  if($_POST['password'] != $_POST['confirm_password']){
    echo json_encode(
      array(
        "checkUser" => false,
        "messageUser" => "ชื่อผู้ใช้นี้ถูกใช้งานแล้ว",
        "checkPass"=> false,
        "messagePass" => "รหัสผ่านไม่ตรงกัน"
      )
    );
  }
}else{
  echo json_encode(
    array(
      "checkUser" => true,
      "messageUser" => "ชื่อผู้ใช้สามารถใช้ได้",
      "checkPass"=> true,
      "messagePass" => "รหัสผ่านตรงกัน"
    )
  );
}



?>