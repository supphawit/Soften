<?php

include 'connect.php'; 
session_start();
error_reporting(0);

  if($_SESSION['username'] != $_GET['username']){
    header("location: ../index.php?showModal=0");

  }

  $changeStatus = $pdo->prepare("UPDATE articles SET status = ? WHERE id = ?");
  $changeStatus->bindParam(1, $_GET["status"]);
  $changeStatus->bindParam(2, $_GET["id"]);
  $changeStatus->execute();

  header("location: ../MyArticle.php");

?>