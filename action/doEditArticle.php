<?php
include 'connect.php'; 
session_start();
error_reporting(0);

  
date_default_timezone_set('Asia/Bangkok');
$dt = new DateTime();
$now = $dt->format('Y-m-d H:i:s');
$cutDate = explode("T", $_GET['datetime']);
$completeDate = $cutDate[0] ." ". $cutDate[1];

if($_GET['time'] == 0){
     $editArticle = $pdo->prepare("UPDATE articles SET header = ?, content = ? , datetime = ? , category = ? ,username = ? , status = ?, pic1 = ? ,pic2 = ? ,pic3 = ? , pic4 = ? ,pic5 = ? , pic6 = ? , pic7 = ? , pic8 = ? , pic9 = ? ,pic10 = ?  WHERE id = ? ");
     $editArticle->bindParam(1, $_GET['header']);
     $editArticle->bindParam(2, $_GET['content']);
     $editArticle->bindParam(3, $now);
     $editArticle->bindParam(4, $_GET['category']);
     $editArticle->bindParam(5, $_SESSION['username']);
     $editArticle->bindParam(6, $_GET['status']);
     $editArticle->bindParam(7, $_GET['pic1']);
     $editArticle->bindParam(8, $_GET['pic2']);
     $editArticle->bindParam(9, $_GET['pic3']);
     $editArticle->bindParam(10, $_GET['pic4']);
     $editArticle->bindParam(11, $_GET['pic5']);
     $editArticle->bindParam(12, $_GET['pic6']);
     $editArticle->bindParam(13, $_GET['pic7']);
     $editArticle->bindParam(14, $_GET['pic8']);
     $editArticle->bindParam(15, $_GET['pic9']);
     $editArticle->bindParam(16, $_GET['pic10']);
     $editArticle->bindParam(17, $_GET['id']);

     $editArticle->execute();
     header("location: ../MyArticle.php");

}else if($_GET['time'] == 1){

    $editArticle = $pdo->prepare("UPDATE articles SET header = ?, content = ? , datetime = ? , category = ? ,username = ? , status = ?, pic1 = ? ,pic2 = ? ,pic3 = ? , pic4 = ? ,pic5 = ? , pic6 = ? , pic7 = ? , pic8 = ? , pic9 = ? ,pic10 = ?  WHERE id = ? ");
    $editArticle->bindParam(1, $_GET['header']);
    $editArticle->bindParam(2, $_GET['content']);
    $editArticle->bindParam(3, $completeDate);
    $editArticle->bindParam(4, $_GET['category']);
    $editArticle->bindParam(5, $_SESSION['username']);
    $editArticle->bindParam(6, $_GET['status']);
    $editArticle->bindParam(7, $_GET['pic1']);
    $editArticle->bindParam(8, $_GET['pic2']);
    $editArticle->bindParam(9, $_GET['pic3']);
    $editArticle->bindParam(10, $_GET['pic4']);
    $editArticle->bindParam(11, $_GET['pic5']);
    $editArticle->bindParam(12, $_GET['pic6']);
    $editArticle->bindParam(13, $_GET['pic7']);
    $editArticle->bindParam(14, $_GET['pic8']);
    $editArticle->bindParam(15, $_GET['pic9']);
    $editArticle->bindParam(16, $_GET['pic10']);
    $editArticle->bindParam(17, $_GET['id']);

    $editArticle->execute();
    header("location: ../MyArticle.php");

}
   


?>