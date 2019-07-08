<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=sec01_rll;charset=utf8", "Sec01_RLL", "K6L4r5Wk");
  } catch (PDOException $e) {
  echo "เกิดข้อผิดพลาด : " . $e->getMessage();
  }
  
?>