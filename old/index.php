<?php
include 'action/connect.php';
session_start();

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

      <script src="https://www.google.com/recaptcha/api.js"></script>

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
          
          <?php
                if(!empty($_SESSION['username'])){
                  echo "<a class='fontONav sign' href='#' >สวัสดี". $_SESSION['firstname']."</a>";
                  echo "<div><a class='fontONav sign' href='action/logout.php'>Sign out</a></div>";
                }else{
                  echo "<a class='fontONav sign' href='#' data-toggle='modal' data-target='#myModal'>Sign In</a>";
                  echo "<div><a class='fontONav sign' href='#'>Register</a></div>";
                }
          ?>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="tab-content marginOK">
                    <div class="tab-pane active " id="Login">
                      <form action="action/checklogin.php" role="form" class="form-horizontal" method="post">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Username</label>
                          <div class="col">
                            <input type="username" class="form-control" name="username" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Password</label>
                          <div class="col">
                            <input type="password" class="form-control" name="password" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="col-sm-12">
                              <a href="#">Forgot your password?</a>
                              <br>
                              <div class='btnCenter'>
                                <button class="btn btn-primary" name="submit">Sign in</button>
                              </div>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LdcsEwUAAAAAMnYt-t7YCyMAXK4zKxAT6ndSwOe">
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
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


      <!-- Start Slide -->
      <div class='container'>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>

          <div class="carousel-inner">
            <?php 
    $news = $pdo->prepare("SELECT * FROM news ORDER BY news.news_id DESC LIMIT 5 ");
    $news->execute(); 
    $active =0;
      while($row = $news->fetch()){
        if( $active === 0){
          echo "<div class='carousel-item active'>";
          echo " <img class='d-block w-100' height='500px' src='img/m" .$row['news_id']. ".jpg' alt='First slide'>";
          echo "<div class='carousel-caption d-none d-md-block'>";
          echo "<div class='alert alert-success' role='alert'>";
          echo "<p>".$row['title']. " </p></div></div></div>";
          $active++;
        }else{
          echo "<div class='carousel-item '>";
          echo " <img class='d-block w-100' height='500px' src='img/m" .$row['news_id']. ".jpg' alt='First slide'>";
          echo "<div class='carousel-caption d-none d-md-block'>";
          echo "<div class='alert alert-success' role='alert'>";
          echo "<p>".$row['title']. " </p></div></div></div>";
        
        }
    }
?>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      </div>

      <div class="container">
        <div align='left'>
          <br>
          <h3 id='news'>&nbsp &nbsp &nbsp &nbsp &nbsp ข่าวและประกาศ</h3>
        </div>
      </div>

      <?php
    if(empty($_GET['more'])){
      $more = 10;
      $getmore= $more+10;
      $load = 0;
    }else{
      $more = $_GET['more'];
      $load = 0;
    }
      $getmore= $more+10;
      $tablenews = $pdo->prepare("SELECT * FROM news ORDER BY news_id DESC LIMIT 0, $more");
      $tablenews->execute(); 
      while($tableDetails = $tablenews->fetch()){
          echo "<div class='container'  id='a".$load++."'></div>";
          echo "<div class='card contentMargin' style='width: 800px;'>";
          echo "<div class='card-header'><br>". $tableDetails['title']."<p align='right'></p>";
          echo "</div></div></div>";
      }
      
          echo "<div align='right' class='moreMargin'>";
          echo "<a href='index.php?more=". $getmore ."#a".$more."'><button type='button'  id='more' class='btn btn-success ' >More</button></a>";
          echo "</div>";
   ?>

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