<?php 

    include 'connect.php'; 

    $stmt = $pdo->prepare("SELECT * FROM members WHERE username = ?");
    $stmt->bindParam(1, $_GET['user']);
    $stmt->execute();
    $row = $stmt->fetch();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    // require_once 'PHPMailer/PHPMailerAutoload.php';
    require 'PHPMailer-new/PHPMailer.php';
    require 'PHPMailer-new/Exception.php';
    require 'PHPMailer-new/SMTP.php';

    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 1;   

    $gmail_username = "rauylaewlerk555@hotmail.com";     // gmail ที่ใช้ส่ง
    $gmail_password = "Sec01_RLL"; // รหัสผ่าน gmail
    $sender = "Reaylawlerk"; // ชื่อผู้ส่ง
    $email_sender = "rauylaewlerk555@hotmail.com"; // เมล์ผู้ส่ง 
    $email_receiver = $row['email']; // เมล์ผู้รับ ***     $row['email']  'arm.realize@gmail.com'
    $subject = "แจ้งเตือนจากแอดมิน"; // หัวข้อเมล์
    $body = "รหัสผ่านของคุณถูกรีเซ็ตแล้ว คุณสามารถเข้าสู่ระบบได้ด้วยรหัสผ่านใหม่ หากการกระทํานี้ไม่ใช่คุณกรุณาติดต่อแอดมิน";

    $mail->isHTML(true);  
    $mail->Body = $body;
    $mail->Username = $gmail_username;
    $mail->Password = $gmail_password;
    $mail->setFrom($email_sender, $sender);
    $mail->addAddress($email_receiver);
    $mail->Subject = $subject;

    if($mail->send()){
      header("location: ../index.php?showModal=1");
    }

?>