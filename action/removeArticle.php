<?php

include 'connect.php'; 
session_start();
error_reporting(0);

  if($_SESSION['username'] != $_GET['username']){
    header("location: ../index.php?showModal=0");

  }

  $deleteArticle = $pdo->prepare("DELETE FROM articles WHERE id = ? AND username = ?");
  $deleteArticle->bindParam(1, $_GET["id"]);
  $deleteArticle->bindParam(2, $_GET["username"]);
  $deleteArticle->execute();

  header("location: ../MyArticle.php");

?>