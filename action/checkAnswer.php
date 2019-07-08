<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require_once 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer-new/PHPMailer.php';
require 'PHPMailer-new/Exception.php';
require 'PHPMailer-new/SMTP.php';


session_start();
// error_reporting(0);  

$stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND status = 1");
$stmt->bindParam(1, $_POST["username"]);
$stmt->execute();
$row = $stmt->fetch();

$response = array();

if(empty($_SESSION['count'])){
  $_SESSION['count'] = 0;
}

if($_SESSION['count'] != 2){
  if($row['Question1'] == $_POST['question1'] && $row['Answer1'] == $_POST['answer1'] && $row['Question2'] == $_POST['question2'] && $row['Answer2'] == $_POST['answer2'] && $row['Question3'] == $_POST['question3'] && $row['Answer3'] == $_POST['answer3']){
    $_SESSION['count'] = 0;
    $response["forget"] = array(
        "success" => true,
        "username" => $row['username'],
        "donttry" => $row['Answer1']
      );
      echo json_encode($response);
    }else{
      $_SESSION['count'] = $_SESSION['count'] + 1 ;
      $response["forget"] = array(
        "success" => false,
        "message" => ' * กรุณาตอบคําถามให้ถูกต้อง * ',
        "count" => $_SESSION['count'],
        "email" => $row['email']
      );
      echo json_encode($response); 
    }
}else{
    $_SESSION['count'] = 0;

    // $mail = new PHPMailer;
    // $mail->CharSet = "utf-8";
    // $mail->isSMTP();
    // $mail->Host = 'smtp-mail.outlook.com';
    // $mail->Port = 587;
    // $mail->SMTPSecure = 'STARTTLS';
    // $mail->SMTPAuth = true;
    // $mail->SMTPDebug = 1;   

    // $gmail_username = "rauylaewlerk@outlook.com";     // gmail ที่ใช้ส่ง
    // $gmail_password = "Sec01_RLL"; // รหัสผ่าน gmail
    // $sender = "Reaylawlerk"; // ชื่อผู้ส่ง
    // $email_sender = "rauylaewlerk@outlook.com"; // เมล์ผู้ส่ง 
    // $email_receiver =  $row['email']; // เมล์ผู้รับ ***     $row['email']  'arm.realize@gmail.com'
    // $subject = "แจ้งเตือนจากแอดมิน"; // หัวข้อเมล์
    // $body = "บัญชีผู้ใช้ของคุณถูกล็อค เนื่องจากคุณพยายาม Reset Password ใหม่ หากการกระทํานี้ไม่ใช่คุณ กรุณาติดต่อแอดมิน";
    
    // $mail->isHTML(true);  
    // $mail->Body = $body;
    // $mail->Username = $gmail_username;
    // $mail->Password = $gmail_password;
    // $mail->setFrom($email_sender, $sender);
    // $mail->addAddress($email_receiver);
    // $mail->Subject = $subject;

    // $mail->send();

      $updateBlock = $pdo->prepare("UPDATE members SET status ='3' WHERE username = ?");
      $updateBlock->bindParam(1, $_POST["username"]);
      $updateBlock->execute();
      
      $response["forget"] = array(
        "block" =>true,
        "message" =>  "* บัญชีผู้ใช้ของคุณถูกล็อคกรุณาติดต่อแอดมิน *",
        "user" => $row['username']
      );
      echo json_encode($response);

    
}

?>