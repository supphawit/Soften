<?php
include 'connect.php';
session_start();
if ($_GET['finish'] != 1) {
  header("location: ../index.php");
}else if($_GET['finish'] == 1){
  header("Refresh: 5;url=../index.php");
}
?>

  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/rllstyle.css" type="text/css">

      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://www.google.com/recaptcha/api.js"></script>

      <title>คนชอบเที่ยว I LIKE TRAVEL</title>
      <link rel="icon" type="image/png" href="../img/world.png" sizes="16x16">

      <style type="text/css">
        .wrapper {
       display: block;
       min-height: 100%; /* real browsers */
       height: auto !important; /* real browsers */
       height: 100%; /* IE6 bug */
       margin-bottom: -10px; /* กำหนด margin-bottom ให้ติดลบเท่ากับความสูงของ footer */
    }
    </style>

    </head>

    <body style="background-color:#fff3ed">

            <div class="wrapper"> <!-- ใช้ class wrapper ที่กำหนดใน style -->

      <nav class="navbar navbar-expand-lg toneweb ">

        <div class="container ">
          <a class="navbar-brand" href="../index.php">
            <button type="button" name='toHome' class="btn btn-rll">
              <h2 class="fontNav">คนชอบเที่ยว &nbsp
                <img src="../img/M.png" alt="logo" height="70px" width="70px"> </img>
              </h2>
            </button>
          </a>
          </div>   

                  <!-- Menu Bar -->
      </nav>
      <nav class="navbar navbar-expand-lg tonemenu">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fontNav" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">Home
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="news.php">News and Announcements</a>
                </div>
              </li>

              <li class="nav-item active">
                <a class="nav-link fontNav" href="#">Knowledge Resource</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fontNav" href="#">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fontNav" href="#">About us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
 <!-- End manu -->

 <!-- Start Thank you -->

 <br><br><b><h1 align = 'center'>ขอบคุณที่ลงทะเบียนกับเว็บไซต์เรา</h1></b><br>
 <i><h5 align = 'center'>กรุณารอข้อความยืนยันจากแอดมิน</h5></i>

<!-- End Thank you -->

 </div> <!-- ปิด class wrapper ที่กำหนดใน style -->     

<!-- Start footer -->
<footer id="footer" class="footersize" style="background-color: #CAA1EE;clear: both;position: relative;z-index: 10;bottom: 0px;">
          <div align='center' class='fontNav'>
            Copyright © 2018 Rauylaewlerk Co.,Ltd. All Rights Reserved.
            <br> Contact : sittisak.s@kkumail.com
          </div>

        </footer>

       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

  </html>