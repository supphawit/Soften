<?php
include 'action/connect.php';
session_start();

?>

  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <link rel="stylesheet" href="css/rllstyle.css" type="text/css">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <title>คนชอบเที่ยว I LIKE TRAVEL</title>
    <link rel="icon" type="image/png" href="img/world.png" sizes="16x16">
  </head>

  <body style="background-color:#fff3ed">
    <nav class="navbar navbar-expand-lg toneweb ">

      <div class="container">
        <a class="navbar-brand" href="index.php" id="logohome">
          <button type="button" name='toHome' class="btn btn-rll">
            <h2 class="fontNav">คนชอบเที่ยว &nbsp
              <img src="img/M.png" alt="logo" height="70px" width="70px"> </img>
            </h2>
          </button>
        </a>
        <div>

          <?php
                if(!empty($_SESSION['username'])){
                  echo "สวัสดี, <a class='fontONav sign' href='#' >". $_SESSION['flname']."</a>";
                  echo "<div><a class='fontONav sign' href='action/logout.php'>Sign out</a></div>";
                }else{
                  echo "<a class='fontONav sign' href='#' data-toggle='modal' data-target='#myModal'>Sign In</a>";
                  echo "<div><a class='fontONav sign' href='register.php'>Register</a></div>";
                }
          ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Sign in</h4>
                    <button type="button" name="closeBox" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="tab-content marginOK">
                    <div class="tab-pane active " id="Login">
                      <form id="loginForm" role="form" class="form-horizontal">
                        <div class="form-group">
                          <div id="alertFail" style="color: red; text-align: center"></div>
                          <label class="col-sm-2 control-label">Username</label>
                          <div class="col">
                            <input type="username" class="form-control" name="usernameLogin" id="usernameLogin" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Password</label>
                          <div class="col">
                            <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="col-sm-12">
                              <a id="forgetPass" href="#">Forgot your password?</a>
                              <br>
                              <div class='btnCenter'>
                                <button id="recap" class="btn btn-primary" name="recap" disabled> Sign in </button>
                              </div>
                            </div>
                            <div data-callback="checkrecap" class="g-recaptcha" data-sitekey="6LdcsEwUAAAAAMnYt-t7YCyMAXK4zKxAT6ndSwOe">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- End Modal -->
                <script>
                  function checkrecap() {
                            document.getElementById("recap").disabled = false;
                          }
                </script>

                  <!-- Menu Bar -->
                  <?php
                      include "menu.php";
                  ?>
                  <!-- End Menu Bar -->

    <div class="container">
    <div align='left'>
        <br>
        <h3>How To</h3>
      </div>
      <table class="table table-hover" style="margin-top:20px;margin-bottom:20px;">
        <?php
          if(!isset($_SESSION['username'])){
            $publicArticle = $pdo->prepare("SELECT * FROM articles WHERE category='howto' AND status = 'public' ORDER BY articles.datetime ASC");
            $publicArticle->execute(); 
            while($rowPublic = $publicArticle->fetch()){
              echo "<tr><td style='padding:20px;' width='1000px'><a href='readArticle.php?id=".$rowPublic['id']."'>". $rowPublic['header'] ."</td></tr>";
            }
          }else{
            $memberArticle = $pdo->prepare("SELECT * FROM articles WHERE category='howto' AND (status = 'public' OR status = 'member') ORDER BY articles.datetime ASC");
            $memberArticle->execute(); 
            while($rowMember = $memberArticle->fetch()){
              echo "<tr><td style='padding:20px;' width='1000px'><a href='readArticle.php?id=".$rowMember['id']."'>". $rowMember['header'] ."</td></tr>";
            }
          }
        ?>
      </table>
    </div>
    <br><br><br><br><br><br><br>
      <footer id="footer" class="footersize" style="background-color: #CAA1EE;clear: both;position: relative;z-index: 10;bottom: 0px;">
        <div align='center' class='fontNav'>
          Copyright © 2018 Rauylaewlerk Co.,Ltd. All Rights Reserved.
          <br> Contact : rauylaewlerk@gmail.com
        </div>
      </footer>


      <script>
        $(document).ready(() => {


          $("#loginForm").submit(async (e) => {
            // No redirect
            e.preventDefault();
            const username = $("#usernameLogin").val();
            const password = $("#passwordLogin").val();

            // Post 
            const response = await $.post(
              'action/checklogin.php', {
                username: username,
                password: password
              }
            );

            if (response.success == false) {
              $("#alertSuccess").hide();
              $("#alertFail").html(
                response.message
              );
              $("#alertFail").show();

            } else if (response.success == true && response.role == 'member') {
              $("#alertSuccess").show(
                setTimeout(() => window.location.href = "index.php", 0)
              );
            } else if (response.success == true && response.role == 'admin') {
              $("#alertSuccess").show(
                setTimeout(() => window.location.href = "admin.php", 0)
              );
            }
          });

          $("#forgetPass").click(async (e) => {
            // No redirect
            e.preventDefault();
            const username = $("#usernameLogin").val();

            // Post 
            const response = await $.post(
              'action/checkForget.php', {
                username: username
              }
            );

            if (response.success == false) {
              $("#alertSuccess").hide();
              $("#alertFail").html(
                response.message
              );
              $("#alertFail").show();

            } else if (response.success == true) {
              $("#alertSuccess").show(
                setTimeout(() => window.location.href = "AnswerQ.php?username=" + response.username, 0)
              );
            }
          });
        });
      </script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
  </body>

  </html>