<?php 
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'connect.php'; 
session_start();
error_reporting(0);

$header = $_POST['header'] ;
$content = $_POST['content'] ;
$datetime = $_POST['datetime'] ;
$category = $_POST['category'] ;
$username = $_POST['username'] ;
$status = $_POST['status'] ;
$pic1 = $_POST['pic1'] ;
$pic2 = $_POST['pic2'] ;
$pic3 = $_POST['pic3'] ;
$pic4 = $_POST['pic4'] ;
$pic5 = $_POST['pic5'] ;
$pic6 = $_POST['pic6'] ;
$pic7 = $_POST['pic7'] ;
$pic8 = $_POST['pic8'] ;
$pic9 = $_POST['pic9'] ;
$pic10 = $_POST['pic10'] ;

date_default_timezone_set('Asia/Bangkok');
$dt = new DateTime();
$now = $dt->format('Y-m-d H:i:s');

$cutDate = explode("T", $_POST['datetime']);
$completeDate = $cutDate[0] ." ". $cutDate[1];

$response = array();

if($_POST['maxPic'] == 1){
  $response["pic"] = array(
    "success" => false,
    "message" => "สามารถอัพโหลดรูปภาพได้สูงสุด 10 ภาพเท่านั้น"
  );
}else{
  $response["pic"] = array(
    "success" => true
  );
}

if($header == "empty"){
  $response["header"] = array(
    "success" => false,
    "message" => "กรุณากรอกหัวข้อบทความ"
  );
}else{
  $response["header"] = array(
    "success" => true,
  );
}

if($_POST['maxPic'] == 0 && $header != "empty"){
  if($_POST['datetime'] == "empty" ){
    $insertArticle = $pdo->prepare("INSERT INTO `articles` (`id`, `header`, `content`, `datetime`, `category`, `username`, `status`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`, `pic9`, `pic10`) VALUES (NULL,'$header', '$content', '$now', '$category', '$username', '$status', '$pic1', '$pic2', '$pic3', '$pic4', '$pic5', '$pic6', '$pic7', '$pic8', '$pic9', '$pic10') ");
    $insertArticle->execute();
    $response["add"] = array(
      "success" => true,
    );
    echo json_encode($response);
  }else{
      $insertArticle = $pdo->prepare("INSERT INTO `articles` (`id`, `header`, `content`, `datetime`, `category`, `username`, `status`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`, `pic9`, `pic10`) VALUES (NULL,'$header', '$content', '$completeDate', '$category', '$username', '$status', '$pic1', '$pic2', '$pic3', '$pic4', '$pic5', '$pic6', '$pic7', '$pic8', '$pic9', '$pic10') ");
      $insertArticle->execute();
      $response["add"] = array(
        "success" => true,
      );
      echo json_encode($response);
    }
  }else{
    echo json_encode($response);
}
?>