<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
session_start();
error_reporting(0);


$response = array();

$checkuser = $pdo->prepare("SELECT * FROM members Where username = ? ");
$checkuser->bindParam(1, $_POST["username"]);
$checkuser->execute();
$rowCheckuser = $checkuser->fetch();

if(isset($rowCheckuser['username'])){
  $response["user"] = array(
    "success" => false,
    "message" => "ชื่อผู้ใช้ถูกใช้งานแล้ว",
  );
}else{
  $response["user"] = array(
    "success" => true
  );
}
 
if($_POST['password'] != $_POST['confirm_password']){
    $response["pass"] = array(
      "success" => false,
      "message" => "รหัสผ่านไม่ตรงกัน"
    );
}else{
    $response["pass"] = array(
      "success" => true
    );
}

  $checkEmail = $pdo->prepare("SELECT * FROM members Where email = ? ");
  $checkEmail->bindParam(1, $_POST["email"]);
  $checkEmail->execute();
  $rowCheckEmail = $checkEmail->fetch();

  if(isset($rowCheckEmail['email'])){
    $response["email"] = array(
      "success" => false,
      "message" => "อีเมลล์นี้ถูกใช้งานแล้ว"
    );
  }else{
    $response["email"] = array(
      "success" => true
    );
  }

  function valid_citizen_id($personID){
		if (strlen($personID) != 13) {
			return false;
		}
		$rev = strrev($personID); 
		$total = 0;
		for($i=1;$i<13;$i++) {
			$mul = $i +1;
			$count = $rev[$i]*$mul; 
			$total = $total + $count; 
		}
		$mod = $total % 11; 
		$sub = 11 - $mod; 
		$check_digit = $sub % 10; 
		if($rev[0] == $check_digit){  
			return true; 
    }else{
			return false; 
    }
  }

  $ssnLength = strlen($_POST['ssn']);

  if(valid_citizen_id($_POST['ssn']) && $ssnLength  == 13){
    $checkSsn = $pdo->prepare("SELECT * FROM members Where ssn = ?");
    $checkSsn->bindParam(1, $_POST["ssn"]);
    $checkSsn->execute();
    $rowCheckSsn = $checkSsn->fetch();

    if(isset($rowCheckSsn['ssn'])){
      $response["ssn"] = array(
        "success" => false,
        "message" => "เลขบัตรประจำตัวหรือพาสสปอร์ตถูกใช้ไปแล้ว"
      );
    }else{
      $response["ssn"] = array(
        "success" => true
      );
    }
  }else{
    $response["ssn"] = array(
      "success" => false,
      "message" => "เลขบัตรประจำตัวไม่ถูกต้อง"
    );
  }

  if($ssnLength  == 9){
    $checkSsn = $pdo->prepare("SELECT * FROM members Where ssn = ?");
    $checkSsn->bindParam(1, $_POST["ssn"]);
    $checkSsn->execute();
    $rowCheckSsn = $checkSsn->fetch();
    if(isset($rowCheckSsn['ssn'])){
      $response["ssn"] = array(
        "success" => false,
        "message" => "เลขบัตรประจำตัวหรือพาสสปอร์ตถูกใช้ไปแล้ว"
      );
    }else{
      $response["ssn"] = array(
        "success" => true
      );
    }
  }

  // if(isset($rowCheckSsn['ssn'])){
  //   $response["ssn"] = array(
  //     "success" => false,
  //     "message" => "เลขบัตรประจำตัวหรือพาสสปอร์ตถูกใช้ไปแล้ว"
  //   );
  // }else if(valid_citizen_id($rowCheckSsn['ssn'] == true && $ssnLength  == 13)){
  //   $response["ssn"] = array(
  //     "success" => true
  //   );
  // }else if($ssnLength  == 9){
  //   $response["ssn"] = array(
  //     "success" => true
  //   );
  // }else{
  //   $response["ssn"] = array(
  //     "success" => false,
  //     "message" => "เลขบัตรประจำตัวไม่ถูกต้อง",
  //     "error" => $ssnLength 
  //   );
  // }
  
  $checkFlname = $pdo->prepare("SELECT * FROM members Where flname = ? ");
  $checkFlname->bindParam(1, $_POST["flname"]);
  $checkFlname->execute();
  $rowCheckFlname = $checkFlname->fetch();

  if($rowCheckFlname['flname'] == $_POST['flname'] && $rowCheckFlname['ssn'] == $_POST['ssn'] && $rowCheckFlname['username'] == $_POST['username']){
    $response["flnameandssn"] = array(
      "success" => false,
      "message" => "ชื่อนี้ไม่สามารถใช้ได้"
    );
  }else{
    $response["flnameandssn"] = array(
      "success" => true
    );
  }

  $cutUpload = explode(".", $_POST['upload']);
  $uploadLower = strtolower($cutUpload[1]);
  $successUpload = $_POST['username'].".".$uploadLower;
  if($uploadLower == "jpg" || $uploadLower == "png" || $uploadLower == "gif" || $uploadLower == "jpeg" ){
    $response["upload"] = array(
      "success" => true,
      "show" => $successUpload
    );
  }else{
    $response["upload"] = array(
      "success" => false,
      "message" => "กรุณาอัปโหลดเป็นไฟล์รูปภาพเท่านั้น (.jpeg, .jpg, .png, .gif)",
    );
  }
  
  function check20($year, $month, $day) {
    if(date('Y') - $year > 20 ){
      return true;
    }else if(date('Y') - $year == 20 ){
      if(date('m') - $month > 0){
        return true;
      }
      if(date('m') - $month == 0){
        if(date('d') - $day > 0){
          return true;
        }
      }
    }else{
      return false;
    }
  }
  
  function check120($year, $month, $day) {
    if(date('Y') - $year < 120 ){
      return true;
    }else if(date('Y') - $year == 120 ){
      if(date('m') - $month < 0){
        return true;
      }
      if(date('m') - $month == 0){
        if(date('d') - $day < 0){
          return true;
        }
      }
    }else{
      return false;
    }
  }

  $cutDate = explode("-", $_POST['datebirth']);
  $sendyear =   $cutDate[0];
  $sendmonth =   $cutDate[1];
  $sendday =  $cutDate[2];

  if(check20($sendyear, $sendmonth, $sendday)){ 
    $response["datebirth"] = array(
      "success" => true
    );
    $anddate = true;
  }else{
    $response["datebirth"] = array(
      "success" => false,
      "message" => "ขออภัยอายุต่ำกว่า 20 หรือมากกว่า 120 ปีไม่สามารถสมัครสมาชิกได้"
    );
     $anddate = false;
  }
  
  if(check120($sendyear, $sendmonth, $sendday) && $anddate){ 
    $response["datebirth"] = array(
      "success" => true
    );
  }else{
    $response["datebirth"] = array(
      "success" => false,
      "message" => "ขออภัยอายุต่ำกว่า 20 หรือมากกว่า 120 ปีไม่สามารถสมัครสมาชิกได้"
    );
  }

  $flname = $_POST['flname'];
  $ssn = $_POST['ssn'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $datebirth = $_POST['datebirth'];
  $question1 = $_POST['question1'];
  $question2 = $_POST['question2'];
  $question3 = $_POST['question3'];
  $answer1 = $_POST['answer1'];
  $answer2 = $_POST['answer2'];
  $answer3 = $_POST['answer3'];
  $email = $_POST['email'];
  $upload = $_POST['upload'];

  if($response['user']['success'] && $response['pass']['success'] && $response['email']['success'] && $response['ssn']['success']  && $response['flnameandssn']['success'] && $response["upload"]['success'] && $response["datebirth"]['success']){
  $insertUser = $pdo->prepare("INSERT INTO `members` (`username`, `password`, `flname`, `email`, `birthDate`, `ssn`, `Question1`, `Question2`, `Question3`, `Answer1`, `Answer2`, `Answer3`, `image`, `role` , `status`) 
                                  VALUES ('$username', '$password', '$flname', '$email', '$datebirth', '$ssn', '$question1', '$question2', '$question3', '$answer1', '$answer2', '$answer3', '$upload', 'member' ,'0')");
  $insertUser->execute();
  $response["finish"] = array(
    "success" => true,
  );
    echo json_encode($response);
  }else{
    echo json_encode($response);
  }

?>