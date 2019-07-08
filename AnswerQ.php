<?php
include 'action/connect.php';
session_start();

     $stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND status = 1");
     $stmt->bindParam(1, $_GET["username"]);
     $stmt->execute();
     $row = $stmt->fetch();
      if ( !isset($row['username']) ) {
        header("location: index.php");
      }


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

      <div class="container ">
        <a class="navbar-brand" href="index.php">
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
                                <button id="recap" class="btn btn-primary" name="recap" disabled>Sign in</button>
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

    <!-- Start Content -->
    <div class="container">
      <div class="row" style="margin-top:50px">
        <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-lg-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

          <div class="row2">
            <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

              <!-- Fields -->
              <div align="center" id="err_forget" style="color: red;"></div>

              <form role="form" id="forget" name="forget" method="post">
                <div class="form-group">

                  <label class="control-label" for="question">Question 1</label>
                  <select class="form-control input-lg" id="question1" name="question1">
                    <?php
                    if($row['Question1'] == 11){
                      echo "<option value='11'>What’s your favorite color?</option>";
                    }
                    if($row['Question1'] == 12){
                      echo "<option value='12'>What is your favorite musical instrument?</option>";
                    }
                    if($row['Question1'] == 13){
                      echo "<option value='13'>Which animals do you like?</option>";
                    }
                  ?>
                  </select>

                  <div class="form-group">
                    <label class="control-label" for="answer">Answer 1</label>
                    <input type="text" name="answer1" id="answer1" class="form-control input-lg" placeholder="Answer" required>
                    <p id="err_answer1"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="question">Question 2</label>
                  <select class="form-control input-lg" id="question2" name="question2">
                    <?php
                    if($row['Question2'] == 21){
                      echo "<option value='21'>What is the capital of your country?</option>";
                    }
                    if($row['Question2'] == 22){
                      echo "<option value='22'>What is your nationality?</option>";
                    }
                    if($row['Question2'] == 23){
                      echo "<option value='23'>What country do you like most?</option>";
                    }
                  ?>
                  </select>

                  <div class="form-group">
                    <label class="control-label" for="answer">Answer 2</label>
                    <input type="text" name="answer2" id="answer2" class="form-control input-lg" placeholder="Answer" required>
                    <p id="err_answer2"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="question">Question 3</label>
                  <select class="form-control input-lg" id="question3" name="question3">
                    <?php
                    if($row['Question3'] == 31){
                      echo "<option value='31'>Who is last girlfriend/boyfriend?</option>";
                    }
                    if($row['Question3'] == 32){
                      echo "<option value='32'>Who is your first kiss?</option>";
                    }
                    if($row['Question3'] == 33){
                      echo "<option value='33'>Where are you traveled in last summer?</option>";
                    }
                  ?>
                  </select>

                  <div class="form-group">
                    <label class="control-label" for="answer">Answer 3</label>
                    <input type="text" name="answer3" id="answer3" class="form-control input-lg" placeholder="Answer" required>
                    <p id="err_answer3"></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <button class="btn" name="btn_reg" id="btn_reg">Submit</button>
                  </div>
                </div>

                <!-- End  Fields -->

            </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- End Content -->


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

          console.log(response);

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
              setTimeout(() => window.location.href = "forgetPassword.php?username=" + response.username, 0)
            );
          }
        });

        $("#forget").submit(async (e) => {
          // No redirect
          e.preventDefault();

          const question1 = $("#question1").val();
          const question2 = $("#question2").val();
          const question3 = $("#question3").val();
          const answer1 = $("#answer1").val();
          const answer2 = $("#answer2").val();
          const answer3 = $("#answer3").val();
          // console.log(question1);
          // console.log(question2);
          // console.log(question3);
          // console.log(answer1);
          // console.log(answer2);
          // console.log(answer3);
          $.post(
            'action/checkAnswer.php', {
              question1: question1,
              question2: question2,
              question3: question3,
              answer1: answer1,
              answer2: answer2,
              answer3: answer3,
              username: '<?=$row['username']?>'
            }
          ).then(response => {
            console.log(response);
            if (response.forget.success == false) {
              $("#err_forget").html(
                response.forget.message
              );
              $("#err_forget").show();
            } else if (response.forget.success == true) {
              $("#err_forget").show(
                setTimeout(() => window.location.href = "resetPassword.php?username=" + response.forget.username +
                  "&donttrytohack=" + response.forget.donttry, 0)
              );
            }
            if (response.forget.block == true) {
              $("#err_forget").html(
                response.forget.message
              );
              $("#err_forget").show();

              $("#err_forget").show(
                setTimeout(() => window.location.href = "action/sendBlock.php?user="+'<?=$row['username']?>', 4000)
              );

            }

          });
        });

      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
  </body>

  </html>