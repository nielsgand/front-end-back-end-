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
                        Register
                      </h1>

                      <?php 

                        include_once("config/Database.php");
                        include_once("class/UserRegister.php");
                        include_once("class/Utils.php");

                        $connectDB = new Database();
                        $db = $connectDB->getConnection();

                        $user = new UserRegister($db);
                        $bs = new Bootstrap();

                        if (isset($_POST['signup'])) {
                            $user->setName($_POST['name']);
                            $user->setEmail($_POST['email']);
                            $user->setPassword($_POST['password']);
                            $user->setConfirmPassword($_POST['confirm_password']);

                            if (!$user->validatePassword()) {
                                $bs->displayAlert("Passwords do not match", "danger");
                                // echo "<div class='alert alert-danger' role='alert'>Passwords do not match</div>";
                            }

                            if (!$user->checkPasswordLength()) {
                                $bs->displayAlert("Password must be at least 6 characters long.", "danger");
                                // echo "<div class='alert alert-danger' role='alert'>Password must be at least 6 characters long.</div>";
                            }

                            if ($user->checkEmail()) {
                                $bs->displayAlert("This email is already exists try another.", "danger");
                                // echo "<div class='alert alert-danger' role='alert'>This email is already exists try another.</div>";
                            }

                            if ($user->createUser()) {
                                $bs->displayAlert("User Created Successfully.", "success");
                                // echo "<div class='alert alert-success' role='alert'>
                                //     User Created Successfully.
                                // </div>";
                            } else {
                                $bs->displayAlert("Failed to create a user.", "danger");
                                // echo "<div class='alert alert-danger' role='alert'>
                                //     Failed to create a user.
                                // </div>";
                            }
                        }
                    
                    ?>


                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="enter your name" value="">
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="enter your email" value="">
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" placeholder="enter your password" value="">
                          </div>
                          <div class="form-group">
                              <label for="password">Confirm Password</label>
                              <input type="password" class="form-control" name="confirm_password" placeholder="confirm your password" value="">
                          </div><br>
                          <button type="submit" class="btn btn-primary" name="signup">Register</button>
                      </form>
                  </div>

                  <!-- <div class="detail-box">
                    <h1>
                      Fast & Secure <br>
                      Web Hosting
                    </h1>
                    <p>
                      Anything embarrassing hidden in the middle of text. All the Lorem Ipsuanything embarrassing hidden in the middle of text. All the Lorem Ipsumm </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                      <a href="" class="btn-2">
                        Contact Us
                      </a>
                    </div>
                  </div> -->
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

  <!-- service section -->

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