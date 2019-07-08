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

          <div class="btn-group">
              <button type="button" class="btn btn-menu"><a href="index.php" class="btn-menu">Home</a></button>
              <button type="button" class="btn btn-menu dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="news.php">News and Announcements<</a>
            </div>
           
           <div class="btn-group">
              <button type="button" class="btn btn-menu"><a href="knowledgeResource.php" class="btn-menu">Knowledge Resource</a></button>
              <button type="button" class="btn btn-menu dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="Knowledge.php">สาระน่ารู้</a>
                <a class="dropdown-item" href="HowTo.php">How to</a>
                <a class="dropdown-item" href="Review.php">Review</a>
                <a class="dropdown-item" href="Travel.php">ที่พัก/การเดินทาง &nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <?php
                   if(isset($_SESSION['username'])){
                      echo "<div class='dropdown-divider'></div><a class='dropdown-item' href='MyArticle.php'>My Article</a></div>";
                  }
                ?>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-menu"><a href="#" class="btn-menu">Events</a></button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-menu"><a href="#" class="btn-menu">About us</a></button>
            </div>
           
          </ul>
        </div>
      </div>
    </nav>