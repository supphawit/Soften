<?php
include 'action/connect.php';
session_start();
if (empty($_SESSION["username"]) ) {
  header("location: index.php");
}
?>

  <html lang="en">

  <body style="background-color:#fff3ed">

    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/rllstyle.css" type="text/css">
      <title>คนชอบเที่ยว I LIKE TRAVEL</title>

    </head>

    <body>
      <nav class="navbar navbar-expand-lg toneweb ">

        <div class="container ">
          <a class="navbar-brand" href="index.php">
            <button type="button" name='toHome' class="btn btn-rll">
              <h2 class="fontNav">คนชอบเที่ยว &nbsp
                <img src="img/M.png" alt="logo" height="70px" width="70px"> </img>
              </h2>
            </button>
          </a>
          <div>
            <a class="fontONav sign" href="#">สวัสดี
              <?=$_SESSION['firstname']?>
            </a>
            <div>
              <a class="fontONav sign" href="action/logout.php">Sign Out</a>
            </div>
          </div>

        </div>

      </nav>

      <!-- Menu Bar -->
      <nav class="navbar navbar-expand-lg tonemenu">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link fontNav" href="admin.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fontNav" href="#">Manage News and Announcdments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fontNav" href="#">Manage User</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- Body -->
      <div>
        ทดสอบ
      </div>


      <!-- Footer -->
      <footer id="footer" class="footersize" style="background-color: #CAA1EE;">
        <div align='center' class='fontNav'>
          Copyright © 2018 Rauylaewlerk Co.,Ltd. All Rights Reserved.
          <br> Contact : sittisak.s@kkumail.com
        </div>

      </footer>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </body>

  </html>