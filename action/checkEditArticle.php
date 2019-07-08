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
$id = $_POST['id'] ;

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
    "message" => "กรุณากรอกหัวข้อบทความ",
    "a" => $_POST['datetime']
  );
}else{
  $response["header"] = array(
    "success" => true,
  );
}

if($_POST['maxPic'] == 0 && $header != "empty"){
  if($_POST['datetime'] == "empty" ){
    $editArticle = $pdo->prepare("UPDATE `articles` SET `header` = ?, `content` = ? , `datetime` = ? , `category` = ? ,`username` = ? , `status` = ?, `pic1` = ? ,`pic2` = ? ,`pic3` = ? , `pic4` = ? ,`pic5` = ? , `pic6` = ? , `pic7` = ? , `pic8` = ? , `pic9` = ? ,`pic10` = ?  WHERE `id` = ? ");
    $editArticle->bindParam(1, $header);
    $editArticle->bindParam(2, $content);
    $editArticle->bindParam(3, $now);
    $editArticle->bindParam(4, $category);
    $editArticle->bindParam(5, $_SESSION['username']);
    $editArticle->bindParam(6, $status);
    $editArticle->bindParam(7, $pic1);
    $editArticle->bindParam(8, $pic2);
    $editArticle->bindParam(9, $pic3);
    $editArticle->bindParam(10, $pic4);
    $editArticle->bindParam(11, $pic5);
    $editArticle->bindParam(12, $pic6);
    $editArticle->bindParam(13, $pic7);
    $editArticle->bindParam(14, $pic8);
    $editArticle->bindParam(15, $pic9);
    $editArticle->bindParam(16, $pic10);
    $editArticle->bindParam(17, $id);

    $editArticle->execute();
    
   $response["edit"] = array(
      "success" => true,
      "time" => 0,
      "check" => $_POST['status']
    );
    echo json_encode($response);

  }else{
    // $insertArticle = $pdo->prepare("UPDATE `articles` SET `header` = '$header', `content` = '$content', `datetime` = '$completeDate', `category` = '$category', `username` = '$username', `status` = '$status', `pic1` = '$pic1', `pic2` = '$pic2', `pic3` = '$pic3', `pic4` = '$pic4', `pic5` = '$pic5', `pic6` = '$pic6', `pic7` = '$pic7', `pic8` = '$pic8', `pic9` = '$pic9', `pic10` = '$pic10' WHERE `articles`.`id` = '$id') ");
    // $insertArticle->execute();
    $editArticle = $pdo->prepare("UPDATE `articles` SET `header` = ?, `content` = ? , `datetime` = ? , `category` = ? ,`username` = ? , `status` = ?, `pic1` = ? ,`pic2` = ? ,`pic3` = ? , `pic4` = ? ,`pic5` = ? , `pic6` = ? , `pic7` = ? , `pic8` = ? , `pic9` = ? ,`pic10` = ?  WHERE `id` = ? ");
    $editArticle->bindParam(1, $header);
    $editArticle->bindParam(2, $content);
    $editArticle->bindParam(3, $completeDate);
    $editArticle->bindParam(4, $category);
    $editArticle->bindParam(5, $_SESSION['username']);
    $editArticle->bindParam(6, $status);
    $editArticle->bindParam(7, $pic1);
    $editArticle->bindParam(8, $pic2);
    $editArticle->bindParam(9, $pic3);
    $editArticle->bindParam(10, $pic4);
    $editArticle->bindParam(11, $pic5);
    $editArticle->bindParam(12, $pic6);
    $editArticle->bindParam(13, $pic7);
    $editArticle->bindParam(14, $pic8);
    $editArticle->bindParam(15, $pic9);
    $editArticle->bindParam(16, $pic10);
    $editArticle->bindParam(17, $id);

    $editArticle->execute();
    
    $response["edit"] = array(
      "success" => true,
      "time" => 1
    );
    echo json_encode($response);

    }
  }else{
    echo json_encode($response);
  }
?>