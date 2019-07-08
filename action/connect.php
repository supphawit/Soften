<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=new_db;charset=utf8", "root", "");
  } catch (PDOException $e) {
  echo "เกิดข้อผิดพลาด : " . $e->getMessage();
  }
  
?>