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
    <link rel="stylesheet" href="css/bootstrap.css">
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
                  echo "<div><a class='fontONav sign' href='#'>Register</a></div>";
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




    <!-- Register -->
    <div class="container">
      <div class="row" style="margin-top:50px">
        <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-lg-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

          <div class="row2">
            <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

              <form role="form" id="register" name="register" method="post">
                <h2>Please Sign Up</h2>

                <div class="form-group">
                  <label class="control-label" for="first_name">First Name and Last Name</label>
                  <input type="text" pattern="([a-zA-Z]+\s{1}[a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]+\s{1}[a-zA-Z]+)" title="กรุณากรอกชื่อ นามสกุลเป็นภาษาไทยหรือภาษาอังกฤษ"
                    name="flname" id="flname" class="form-control input-lg" placeholder="First Name and Last Name" required
                    autofocus>
                  <div id="err_flname" style="color: red;"></div>
                  <div id="suc_flname" style="color: green;"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="ssn">SSN / Passport</label>
                  <input type="text" pattern="(\d{13}|[A-Z]{2}\d{7})" title="กรุณากรอกเลขบัตรประชาชนหรือเลขพาสสปอร์ตให้ถูกต้อง" name="ssn"
                    id="ssn" class="form-control input-lg" placeholder="SSN / Passport" required>
                  <div id="err_ssn" style="color: red;"></div>
                  <div id="suc_ssn" style="color: green;"></div>
                </div>

                <div class="form-group">
                  <label for="input-folder-1">Upload File From Folder</label>
                  <div class="file-loading input-lg">
                    <input id="pic" name="pic" type="file" accept="image/*" data-type="image" required>
                    <div id="err_pic" style="color: red;"></div>
                  </div>

                </div>
                <script>
                  $(document).on('ready', function () {
                    $("#input-folder-1").fileinput({
                      browseLabel: 'Select Folder...'
                    });
                  });
                </script>

                <div class="form-group">
                  <label class="control-label" for="Username">Username</label>
                  <input type="text" pattern="[a-zA-Z0-9ก-๙_-]+" title="กรุณากรอกชื่อผู้ใช้ตั้งแต่ 1 ตัวขึ้นไป" name="username" id="username"
                    class="form-control input-lg" placeholder="Username" required>
                  <div id="err_username" style="color: red;"></div>
                  <div id="suc_username" style="color: green;"></div>
                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="password">Password</label>
                      <input type="password" pattern="[a-zA-Z0-9_-]{16,}" title="กรุณากรอกรหัสให้ครบ 16 ตัวขึ้นไป" name="password" id="password"
                        class="form-control input-lg" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter and can use speical charecter (-_), and at least 16 or more characters"
                        required>
                      <p id="err_password"></p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="password_confirmation">Confirm-Password</label>
                      <input type="password" pattern="[a-zA-Z0-9_-]{16,}" title="กรุณากรอกรหัสให้ครบ 16 ตัวขึ้นไป" name="confirm_password" id="confirm_password"
                        class="form-control input-lg" placeholder="Confirm Password" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div id="err_checkpassword" style="color: red;"></div>
                  <div id="suc_checkpassword" style="color: green;"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="email">E-mail</label>
                  <input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail" required>
                  <div id="err_email" style="color: red;"></div>
                  <div id="suc_email" style="color: green;"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="datebirth">Date of Birth</label>
                  <input type="date" name="datebirth" id="datebirth" class="form-control input-lg" required>
                  <div id="err_date" style="color: red;"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="question">Question 1</label>
                  <select class="form-control input-lg" id="question1" name="question1">
                    <option value='11'>What’s your favorite color?</option>
                    <option value='12'>What is your favorite musical instrument?</option>
                    <option value='13'>Which animals do you like?</option>
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
                    <option value='21'>What is the capital of your country?</option>
                    <option value='22'>What is your nationality?</option>
                    <option value='23'>What country do you like most?</option>
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
                    <option value='31'>Who is last girlfriend/boyfriend?</option>
                    <option value='32'>Who is your first kiss?</option>
                    <option value='33'>Where are you traveled in last summer?</option>
                  </select>

                  <div class="form-group">
                    <label class="control-label" for="answer">Answer 3</label>
                    <input type="text" name="answer3" id="answer3" class="form-control input-lg" placeholder="Answer" required>
                    <p id="err_answer3"></p>
                  </div>
                </div>

                <div class="form-group">
                  &nbsp&nbsp&nbsp&nbsp&nbsp
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                  <label for="terms">By Creating an Account, you Agree
                    <a href="#" data-toggle="modal" data-target="#termaccept">Term of service.</a> for Registration.</label>
                  <p id="err_exampleCheck1"></p>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="termaccept" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Term of service and Privacy Notice</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">

                        <p>1. Applicants for membership of the website can register only one account per person.
                          <br> 2. Website member’s personal detail have to be correctly given otherwise admin will not allow
                          your membership.
                          <br> 3. we keep your personal information save other people can’t access to your information.
                          <br> 4. Website member must keep username and password save and must no share it with other people.
                          <br> 5. Website member will be responsible for any damages incurred as a result of their use of the
                          Site.
                          <br> 6. Website Admin can change member website’s role or delete account with out notice that user
                          if that user don’t follow this term of service or
                          <br> - Members of the website write and publish illegal articles, threatening, threatening, defamatory,
                          abusive, vulgar, obscene, profane, defamatory, or otherwise defamatory, or defamatory or defamatory.
                          Or articles that incites riots.
                          <br> - Members of the site make comments that are threatening, defamatory, libelous, abusive, vulgar,
                          obscene, profane, abusive, disrespectful. Or to incite riots.
                          <br>

                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <button class="btn" name="btn_reg" id="btn_reg">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(() => {
        function checkPasswordMatch() {
          var password = $("#password").val();
          var confirmPassword = $("#confirm_password").val();

          if (password != confirmPassword) {
            $("#err_checkpassword").html("รหัสผ่านไม่ตรงกัน");
            $("#err_checkpassword").show();
            $("#suc_checkpassword").hide();
          } else {
            $("#err_checkpassword").hide();
          }
        }
        $("#confirm_password").keyup(checkPasswordMatch);


        $("#loginForm").submit(async (e) => {
          // No redirect
          e.preventDefault();
          const usernameLogin = $("#usernameLogin").val();
          const passwordLogin = $("#passwordLogin").val();

          // Post 
          const response = await $.post(
            'action/checklogin.php', {
              username: usernameLogin,
              password: passwordLogin
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

        $("#register").submit(async (e) => {
          // No redirect
          e.preventDefault();

          const flname = $("#flname").val();
          const ssn = $("#ssn").val();
          const username = $("#username").val();
          const password = $("#password").val();
          const confirm_password = $("#confirm_password").val();
          const datebirth = $("#datebirth").val();
          const question1 = $("#question1").val();
          const question2 = $("#question2").val();
          const question3 = $("#question3").val();
          const answer1 = $("#answer1").val();
          const answer2 = $("#answer2").val();
          const answer3 = $("#answer3").val();
          const email = $("#email").val();
          const pic = $("#pic").val();
          const upload = pic.split("C:\\fakepath\\").join('');
          $.post(
            'action/insertUser.php', {
              flname: flname,
              ssn: ssn,
              username: username,
              password: password,
              confirm_password: confirm_password,
              datebirth: datebirth,
              question1: question1,
              question2: question2,
              question3: question3,
              answer1: answer1,
              answer2: answer2,
              answer3: answer3,
              email: email,
              upload: upload
            }
          ).then(response => {
            console.log(response);
            if (response.user.success == false) {
              $("#suc_username").hide();
              $("#err_username").html(
                response.user.message
              );
              $("#err_username").show();
            } else if (response.user.success == true) {
              $("#err_username").hide();
            }

            if (response.pass.success == false) {
              $("#suc_checkpassword").hide();
              $("#err_checkpassword").html(
                response.pass.message
              );
              $("#err_checkpassword").show();
            } else if (response.pass.success == true) {
              $("#err_checkpassword").hide();
            }

            if (response.email.success == false) {
              $("#suc_email").hide();
              $("#err_email").html(
                response.email.message
              );
              $("#err_email").show();
            } else if (response.email.success == true) {
              $("#err_email").hide();
            }

            if (response.ssn.success == false) {
              $("#suc_ssn").hide();
              $("#err_ssn").html(
                response.ssn.message
              );
              $("#err_ssn").show();
            } else if (response.ssn.success == true) {
              $("#err_ssn").hide();
            }

            if (response.flnameandssn.success == false) {
              $("#suc_flname").hide();
              $("#err_flname").html(
                response.flnameandssn.message
              );
              $("#err_flname").show();
            } else if (response.flnameandssn.success == true) {
              $("#err_flname").hide();
            }

            if (response.upload.success == false) {
              $("#err_pic").html(
                response.upload.message,
              );
              $("#err_pic").show();
            } else if (response.upload.success == true) {
              $("#err_pic").hide();
            }

            if (response.datebirth.success == false) {
              $("#err_date").html(
                response.datebirth.message
              );
              $("#err_date").show();
            } else if (response.datebirth.success == true) {
              $("#err_date").hide();
            }

            if (response.finish.success == true) {
              setTimeout(() => window.location.href = "action/Thankyou.php?finish=1", 0)
            }
          });
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
          console.log(response);

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

    <!-- Footer -->
    <footer id="footer" class="footersize" style="background-color: #CAA1EE;">
      <div align='center' class='fontNav'>
        Copyright © 2018 Rauylaewlerk Co.,Ltd. All Rights Reserved.
        <br> Contact : rauylaewlerk@gmail.com
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
  </body>

  </html>