<?php 
include 'connect.php'; 
session_start();


if (isset($_POST['submit'])) {
  $secret = '6LdcsEwUAAAAADXbfStbk288uCGLsG8w-lD6UanF';
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  
  $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    $result = json_decode($url, TRUE);
    if ($result['success'] == 1) {
      $reCapSuccess = 1;
  }
}

$stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND password = ?");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();

if (!empty($row) && $reCapSuccess == 1) {
  $_SESSION["username"] = $row["username"];
  $_SESSION["firstname"] = $row["firstname"];
  $_SESSION['role'] = $row['role'];

  if($row['role'] == 'admin'){
    header("location:../admin.php");
  }else if($row['role'] == 'member'){
    header("location:../index.php"); 
  }
}else{
  echo "<br><br><br><br><br><br><br><br><br> <h1 align='center'> Please finish reCaptcha before sign in</h1>";
  header("Refresh: 5;url=../index.php");
}
?>