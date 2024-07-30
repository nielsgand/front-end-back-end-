<?php

    session_start();

    if (isset($_SESSION['userid'])) {
      header("Location: welcome.php");
    }

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Hostit</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <?php include_once("nav.php"); ?>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                      <h1>
                        Login
                      </h1>


                      <?php 

                        include_once("config/Database.php");
                        include_once("class/UserLogin.php");
                        include_once("class/Utils.php");

                        $connectDB = new Database();
                        $db = $connectDB->getConnection();

                        $user = new UserLogin($db);
                        $bs = new Bootstrap();

                        if (isset($_POST['signin'])) {
                            $user->setEmail($_POST['email']);
                            $user->setPassword($_POST['password']);

                            if ($user->emailNotExists()) {
                                $bs->displayAlert("Email is not exists", "danger");
                                // echo "<div class='alert alert-danger' role='alert'>Email is not exists</div>";
                            } else {
                                if ($user->verifyPassword()) {
                                    // $bs->displayAlert("Email is not exists", "danger");
                                    // echo "<div class='alert alert-success' role='alert'>Password matches</div>";
                                } else {
                                    $bs->displayAlert("Password do not match", "danger");
                                    // echo "<div class='alert alert-danger' role='alert'>Password do not match</div>";
                                }
                                // echo "<div class='alert alert-success' role='alert'>Email is exists</div>";
                            }
                        }

                      ?>

                      <form action="" method="POST">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="enter your email" value="">
                          </div>
                          <div class="form-goup">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" placeholder="enter your password" value="">
                          </div><br>
                          <button type="submit" class="btn btn-primary" name="signin">Login</button>
                      </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class=" col-lg-10 mx-auto">
                      <div class="img-box">
                        <img src="images/slider-img.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        </div>
        
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>