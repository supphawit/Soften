<?php
include 'action/connect.php';
session_start();

$memberArticle = $pdo->prepare("SELECT * FROM articles WHERE username = ? AND id = ?");
$memberArticle->bindParam(1, $_GET['username']);
$memberArticle->bindParam(2, $_GET['id']);
$memberArticle->execute(); 
$rowMember = $memberArticle->fetch();
if(!isset($_SESSION['username']) or !isset($rowMember['header'])){
  header("location: index.php");
}
if($_SESSION['username'] != $_GET['username']){
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

                    <?php
                      include "menu.php";
                    ?>

    <!-- Start Content -->
    <div class="container">
      <div class="row" style="margin-top:50px">
        <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-lg-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

          <div class="row2">
            <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

              <!-- Fields -->
              <div align="center" id="err_add" style="color: red;"></div>

              <form role="form" id="editArticle" name="editArticle" method="post">

                <div class="form-group">

                  <label class="control-label" for="header">Header</label>
                  <input type="text" name="header" id="header" class="form-control input-lg" value="<?=$rowMember['header']?>" >
                  <div id="err_header" style="color: red;"></div>
                </div>

                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" id="content" name="content" rows="20" ><?=$rowMember['content']?></textarea>
                </div>

                <div class="form-group">
                  <label for="input-folder-1">Upload File From Folder</label>
                  <div class="file-loading input-lg">
                    <input id="pic" name="pic" type="file" accept="image/*" data-type="image" multiple>
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
                  <label class="control-label" for="status">Status</label>
                  <select class="form-control input-lg" id="status" name="status">
                  <?php
                    if($rowMember['status'] == 'public'){
                      echo "<option value='public'>Public</option>
                      <option value='member'>Member</option>
                      <option value='preview'>Preview</option>";
                    }else if($rowMember['status'] == 'member'){
                      echo " <option value='member'>Member</option>
                      <option value='public'>Public</option>
                      <option value='preview'>Preview</option>";
                    }else if($rowMember['status'] == 'preview'){
                      echo " <option value='preview'>Preview</option>
                      <option value='member'>Member</option>
                      <option value='public'>Public</option>";
                    }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label" for="datetime">Date-time</label>
                  <input type="datetime-local" name="datetime" id="datetime" class="form-control input-lg">
                  <div id="err_date" style="color: red;"></div>
                </div>

                <div class="form-group">
                  <label class="control-label" for="category">Category</label>
                  <select class="form-control input-lg" id="category" name="category">
                  <?php
                    if($rowMember['category'] == 'knowledge'){
                      echo "<option value='knowledge'>สาระน่ารู้</option>
                      <option value='howto'>How To</option>
                      <option value='review'>Review</option>
                      <option value='travel'>ที่พัก/การเดินทาง</option>";
                    }else if($rowMember['category'] == 'howto'){
                      echo "<option value='howto'>How To</option>
                      <option value='knowledge'>สาระน่ารู้</option>
                      <option value='review'>Review</option>
                      <option value='travel'>ที่พัก/การเดินทาง</option>";
                    }else if($rowMember['category'] == 'review'){
                      echo "<option value='review'>Review</option>
                      <option value='howto'>How To</option>
                      <option value='knowledge'>สาระน่ารู้</option>
                      <option value='travel'>ที่พัก/การเดินทาง</option>";
                    }
                    else if($rowMember['category'] == 'travel'){
                      echo "<option value='travel'>ที่พัก/การเดินทาง</option>
                      <option value='review'>Review</option>
                      <option value='howto'>How To</option>
                      <option value='knowledge'>สาระน่ารู้</option>";
                    }
                  ?>
                  </select>
                </div>

                <div class="row">
                  <div class="col-xs-3 col-sm-3 col-md-3">
                    <button class="btn" name="btn_add" id="btn_add">แก้ไขบทความ</button>
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

<Br><br>
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

         $("#editArticle").submit(async (e) => {
          // No redirect
          e.preventDefault();

          var header = $("#header").val();
          const content =$("#content").val();
          const status = $("#status").val();
          const category = $("#category").val();
          var datetime = $("#datetime").val();
          var maxPic = 0;
          
          var $fileUpload = $("input[type='file']");
          if (parseInt($fileUpload.get(0).files.length)>10){
              maxPic = 1;
          } 

          var pic = $("#pic")[0].files;
          var picArray = new Array();
          for(i=0;i<pic.length;i++){
            picArray.push(pic[i].name);
          }
          for(j=0;j<10;j++){
            if( typeof picArray[j] == 'undefined'){
              picArray[j] ="";
            }
          }
          if(datetime == ""){
            datetime = "empty";
          }
          if(header == ""){
            header = "empty";
          }
          
          // Post 
          const response = await $.post(
            'action/checkEditArticle.php', {
              header: header,
              content: content,
              status: status,
              maxPic: maxPic,
              category: category,
              datetime: datetime,
              pic1: picArray[0],
              pic2: picArray[1],
              pic3: picArray[2],
              pic4: picArray[3],
              pic5: picArray[4],
              pic6: picArray[5],
              pic7: picArray[6],
              pic8: picArray[7],
              pic9: picArray[8],
              pic10: picArray[9],
              id: '<?=$_GET['id']?>',
              username: '<?=$_SESSION['username']?>'
            }
          );
          console.log(response);

          if (response.pic.success == false) {
            $("#err_pic").html(
              response.pic.message
            );
            $("#err_pic").show();
          }else{
            $("#err_pic").hide();
          }
          if (response.header.success == false) {
            $("#err_header").html(
              response.header.message
            );
            $("#err_header").show();
          }else{
            $("#err_header").hide();
          }
          if(response.edit.success == true){
              $("#err_pic").show(        
                setTimeout(() => window.location.href = "MyArticle.php" , 0)                                                                                                     
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