<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT pol_id, usernm, passwrd FROM pol_login WHERE usernm = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $table_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$table_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Cosmix Free HTML5 Responsive Template | Template Stock</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Preloader-->
<div id="preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>
<!--Navigation-->
<header id="menu">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#menu"><img src="images/Logo/mine.png" alt="" height = 200px ></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li><a class="scroll" href="#logo"></a></li>
            <li class="active"><a class="scroll" href="#menu">Home</a></li>
            <li><a class="analyse" href="#about">Analyse your area</a></li>
            <li><a class="scroll" href="#about">About</a></li>
            <li><a class="scroll" href="#service">Service</a></li>
            <li><a class="scroll" href="#features">Team</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">&nbsp</a></li>
            <li><a class="scroll" href="#features">Login</a></li>
            <li><a class="scroll" href="#features">Sign-up</a></li>
          
            
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
</header>
<!--Slider-Start-->
<section id="slider">
  <div id="home-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active" style="background-image:url(images/Slider/2.jpeg)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1>We are for you</h1>
              <h2>Aware, Beware & Beyond....</h2>
              <p>We aim to bring about a change in your life.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item" style="background-image:url(images/Slider/1.jpg)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1>Aware</h1>
              <h2>Prepared.</h2>
              <p>Stay a step ahead!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item" style="background-image:url(images/Slider/3.jpeg)">
        <div class="carousel-caption container">
          <div class="row">
             <div class="col-md-7 col-sm-12 col-xs-12">
              <h1>Beware</h1>
              <h2>On your toes.</h2>
              <p>Better to be safe...isn't it?</p>
            </div>
          </div>
        </div>
      </div>
      <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
  </div>
  <!--/#home-carousel-->
</section>
<!--About-Section-Start-->
<section id="about">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
    <div class="bg-white h-100 p-4 shadow">
                <h3 class="mb-4 text-cursive">Enter your details</h3>
                <p><span class="error">* required field</span></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
        </div>
      <div class="heading">
        <h2>ABOUT <span>US</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ab-sec">
        <div class="col-md-6">
          <h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><span>W</span>e Are Creative And Awesome</h3>
          <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.Lorem Ipsum is simply dummy text of the printing and typesetting industry. book. </p>
        </div>
        <div class="col-md-6 ab-sec-img wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms"><img src="images/Aboutus/01.jpg" alt=""> </div>
      </div>
    </div>
  </div>
</section>
<!--About-Sec-2-Start-->
<div class="bg-sec">
  <div class="container">
    <div class="col-md-10 col-sm-10 col-xs-8">
      <h3>Premium quality free onepage template</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-4"> <a class="btn-down" href="#">Download</a> </div>
  </div>
</div>
<!--Service-Section-Start-->
<section id="service">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>OUR SERVI<span>CE</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="features-sec">
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-line-chart"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">UX Design</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-cubes"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">UI Design</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-pie-chart"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Marketing</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-bar-chart"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">SEO Services</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-language"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Android App</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
        <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
          <div class="media service-box">
            <div class="pull-left"> <i class="fa fa-bullseye"></i> </div>
            <div class="media-body">
              <h5 class="media-heading">Clean Code</h5>
              <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
            </div>
          </div>
        </div>
        <!--/.col-md-4-->
      </div>
    </div>
    <div class="experience">
      <div class="col-sm-6 col-xs-12">
        <div class="our-skills wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <p class="lead">User Experiances</p>
            <div class="progress">
              <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="90" style="width: 95%;"> 95% </div>
            </div>
          </div>
          <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="400ms">
            <p class="lead">Web Design</p>
            <div class="progress">
              <div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="80" style="width: 80%;"> 80% </div>
            </div>
          </div>
          <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
            <p class="lead">Programming</p>
            <div class="progress">
              <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="60" style="width: 60%;"> 60% </div>
            </div>
          </div>
          <div class="single-skill wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="600ms">
            <p class="lead">Fun</p>
            <div class="progress">
              <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar" aria-valuenow="0" aria-valuemin="100" aria-valuemax="70" style="width: 70%;"> 70% </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms"> <img src="images/Service/01.png" class="img-responsive" alt=""> </div>
    </div>
  </div>
</section>
<!--Features-Section-Start-->
<section id="features">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>AWESOME FEATUR<span>ES</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab-1" role="tab" data-toggle="tab"><i class="fa fa-paper-plane"></i></a></li>
      <li role="presentation"><a href="#tab-2" role="tab" data-toggle="tab"><i class="fa fa-laptop"></i></a></li>
      <li role="presentation"><a href="#tab-3" role="tab" data-toggle="tab"><i class="fa fa-code"></i></a></li>
      <li role="presentation"><a href="#tab-4" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
      <li role="presentation"><a href="#tab-5" role="tab" data-toggle="tab"><i class="fa fa-file-image-o"></i></a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
        <div class="col-md-6 tab">
          <h5>Web Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/01.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-2">
        <div class="col-md-6 tab">
          <h5>Graphic Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/02.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-3">
        <div class="col-md-6 tab">
          <h5>Web Development</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/03.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-4">
        <div class="col-md-6 tab">
          <h5>Responsive Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/04.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-5">
        <div class="col-md-6 tab">
          <h5>Creative Gallery</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing<br>
          </p>
          <p class="feat-sec-1">Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/05.jpg" class="img-responsive" alt=""></div>
      </div>
    </div>
  </div>
</section>
<!--Portfolio-Section-Start-->
<section id="portfolio">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>AWESOME FEATUR<span>ES</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="text-center">
      <ul class="portfolio-filter">
        <li><a class="active" href="#" data-filter="*">All Works</a></li>
        <li><a href="#" data-filter=".creative">Creative</a></li>
        <li><a href="#" data-filter=".corporate">Corporate</a></li>
        <li><a href="#" data-filter=".portfolio">Portfolio</a></li>
      </ul>
      <!--/#portfolio-filter-->
    </div>
    <div class="portfolio-items">
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item creative">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/01.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/01.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-1</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate portfolio">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/02.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/02.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-2</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item creative">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/03.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/03.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-3</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/04.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/04.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-4</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item creative portfolio">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/05.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/05.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-5</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
      <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item corporate">
        <div class="portfolio-item-inner"> <img class="img-responsive" src="images/Portfolio/06.jpg" alt="">
          <div class="portfolio-info"> <a class="preview" href="images/Portfolio/06.jpg" data-rel="prettyPhoto"><i class="fa fa-plus-circle"></i></a>
            <h6>ITEM-6</h6>
            <p>Lorem Ipsum</p>
          </div>
        </div>
      </div>
      <!--/.portfolio-item-->
    </div>
  </div>
</section>
<!--Pricing-Section-Start-->
<section id="pricing">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>PRICE PACKAG<span>ES</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">
          <ul class="pricing">
            <li class="plan-header">
              <div class="price-duration">
                <div class="price"> $39 </div>
                <div class="duration"> per month </div>
              </div>
              <div class="plan-name"> Starter </div>
            </li>
            <li><strong>1</strong> DOMAIN</li>
            <li><strong>100GB</strong> DISK SPACE</li>
            <li><strong>UNLIMITED</strong> BANDWIDTH</li>
            <li>SHARED SSL CERTIFICATE</li>
            <li><strong>10</strong> EMAIL ADDRESS</li>
            <li><strong>24/7</strong> SUPPORT</li>
            <li><a class="btn-order" href="#">Order Now</a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">
          <ul class="pricing">
            <li class="plan-header">
              <div class="price-duration">
                <div class="price"> $69 </div>
                <div class="duration"> per month </div>
              </div>
              <div class="plan-name"> Business </div>
            </li>
            <li><strong>3</strong> DOMAIN</li>
            <li><strong>300GB</strong> DISK SPACE</li>
            <li><strong>UNLIMITED</strong> BANDWIDTH</li>
            <li>SHARED SSL CERTIFICATE</li>
            <li><strong>30</strong> EMAIL ADDRESS</li>
            <li><strong>24/7</strong> SUPPORT</li>
            <li><a class="btn-order" href="#">Order Now</a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="400ms">
          <ul class="pricing">
            <li class="plan-header">
              <div class="price-duration">
                <div class="price"> $99 </div>
                <div class="duration"> per month </div>
              </div>
              <div class="plan-name"> Pro </div>
            </li>
            <li><strong>5</strong> DOMAIN</li>
            <li><strong>500GB</strong> DISK SPACE</li>
            <li><strong>UNLIMITED</strong> BANDWIDTH</li>
            <li>SHARED SSL CERTIFICATE</li>
            <li><strong>50</strong> EMAIL ADDRESS</li>
            <li><strong>24/7</strong> SUPPORT</li>
            <li><a class="btn-order" href="#">Order Now</a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="600ms">
          <ul class="pricing">
            <li class="plan-header">
              <div class="price-duration">
                <div class="price"> $199 </div>
                <div class="duration"> per month </div>
              </div>
              <div class="plan-name"> Ultra </div>
            </li>
            <li><strong>10</strong> DOMAIN</li>
            <li><strong>1000GB</strong> DISK SPACE</li>
            <li><strong>UNLIMITED</strong> BANDWIDTH</li>
            <li>SHARED SSL CERTIFICATE</li>
            <li><strong>100</strong> EMAIL ADDRESS</li>
            <li><strong>24/7</strong> SUPPORT</li>
            <li><a class="btn-order" href="#">Order Now</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Team-Section-Start-->
<section id="team">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>OUR TE<span>AM</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
        <div class="team-sec">
          <div class="team-img"> <img src="images/Team/01.jpg" class="img-responsive" alt="">
            <div class="team-desc">
              <h5>Julia Amanda</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <ul class="team-social-icon">
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".2s">
        <div class="team-sec">
          <div class="team-img"> <img src="images/Team/02.jpg" class="img-responsive" alt="">
            <div class="team-desc">
              <h5>Merry Luis</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <ul class="team-social-icon">
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".3s">
        <div class="team-sec">
          <div class="team-img"> <img src="images/Team/03.jpg" class="img-responsive" alt="">
            <div class="team-desc">
              <h5>Poll Astin</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <ul class="team-social-icon">
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".4s">
        <div class="team-sec">
          <div class="team-img"> <img src="images/Team/04.jpg" class="img-responsive" alt="">
            <div class="team-desc">
              <h5>Janea Syria</h5>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
              <ul class="team-social-icon">
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Testimonials-Section-Start-->
<section id="testimonials" class="parallex">
  <div class="container">
    <div class="quote"> <i class="fa fa-quote-left"></i> </div>
    <div class="clearfix"></div>
    <div class="slider-text">
      <div id="owl-testi" class="owl-carousel owl-theme">
        <div class="item">
          <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/02.jpg" class="img-circle" alt="">
            <h5>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi.</h5>
            <h6>EMA JOHNSON</h6>
            <p>Web Developer</p>
          </div>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/03.jpg" class="img-circle" alt="">
          <h5>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur</h5>
          <h6>SAM DEEN</h6>
          <p>Web Designer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/04.jpg" class="img-circle" alt="">
          <h5>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas</h5>
          <h6>JOHN DOE</h6>
          <p>CEO</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Fun-Facts-Section-Start-->
<section id="fun-facts">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-thumbs-o-up"></i> <span class="timer">365</span></h3>
          <h6>Happy Clients</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-briefcase fa-6"></i> <span class="timer">73987</span></h3>
          <h6>Completed Projects</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-coffee"></i> <span class="timer">297345</span></h3>
          <h6>Cups of Coffee</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-code"></i> <span class="timer">9823686</span></h3>
          <h6>Lines of Code</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Blog-Section-Start-->
<section id="blog">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>LATEST BL<span>OG</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4 blog-sec">
          <div class="blog-info"> <img src="images/Blog/1.jpg" class="img-responsive" alt="">
            <div class="data-meta">
              <h4>Jan</h4>
              <strong>10</strong><br>
              2016 </div>
            <a href="#">
            <h5>Sed ut perspiciatis unde omnis</h5>
            </a>
            <ul class="blog-icon">
              <li><i class="fa fa-pencil"></i><a href="#">
                <h6>John</h6>
                </a></li>
              <li class="comment"><i class="fa fa-comment"></i><a href="#">
                <h6>13</h6>
                </a></li>
            </ul>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.</p>
            <a href="#" class="btn-blg">Read More</a> </div>
        </div>
        <div class="col-md-4 blog-sec">
          <div class="blog-info"> <img src="images/Blog/2.jpg" class="img-responsive" alt="">
            <div class="data-meta">
              <h4>Jan</h4>
              <strong>20</strong><br>
              2016 </div>
            <a href="#">
            <h5>Sed ut perspiciatis unde omnis</h5>
            </a>
            <ul class="blog-icon">
              <li><i class="fa fa-pencil"></i><a href="#">
                <h6>Maria</h6>
                </a></li>
              <li class="comment"><i class="fa fa-comment"></i><a href="#">
                <h6>04</h6>
                </a></li>
            </ul>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.</p>
            <a href="#" class="btn-blg">Read More</a> </div>
        </div>
        <div class="col-md-4 blog-sec">
          <div class="blog-info"> <img src="images/Blog/3.jpg" class="img-responsive" alt="">
            <div class="data-meta">
              <h4>Jan</h4>
              <strong>31</strong><br>
              2016 </div>
            <a href="#">
            <h5>Sed ut perspiciatis unde omnis</h5>
            </a>
            <ul class="blog-icon">
              <li><i class="fa fa-pencil"></i><a href="#">
                <h6>Bear</h6>
                </a></li>
              <li class="comment"><i class="fa fa-comment"></i><a href="#">
                <h6>05</h6>
                </a></li>
            </ul>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.</p>
            <a href="#" class="btn-blg">Read More</a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Client-Section-Start-->
<div id="client">
  <div class="container">
    <div id="client-slider" class="owl-carousel">
      <div class="item client-logo"> <a href="#"><img src="images/clients/1.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/2.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/3.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/4.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/5.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/6.png" class="img-responsive" alt=""/></a> </div>
      <div class="item client-logo"> <a href="#"><img src="images/clients/7.png" class="img-responsive" alt=""/></a> </div>
    </div>
  </div>
</div>
<!--Contact-Section-Start-->
<section id="contact">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>CONTACT <span>US</span></h2>
        <div class="line"></div>
        <p><span><strong>L</strong></span>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
          et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>
    </div>
    <div class="text-center">
      <div class="col-md-6 col-sm-6 contact-sec-1">
        <h4>CONTACT IN<span>FO</span></h4>
        <ul class="contact-form">
          <li><i class="fa fa-map-marker"></i>
            <h6><strong>Address:</strong> No 123 , Wallstreet, India </h6>
          </li>
          <li><i class="fa fa-envelope"></i>
            <h6><strong>Mail Us:</strong> <a href="#">Info@yourdomain.com</a></h6>
          </li>
          <li><i class="fa fa-phone"></i>
            <h6><strong>Phone:</strong> +91 123-456-7890 </h6>
          </li>
          <li><i class="fa fa-wechat"></i>
            <h6><strong>Website:</strong> <a href="#">www.Cosmix.com</a> </h6>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-6">
        <form id="main-contact-form" name="contact-form" method="post" action="#">
          <div class="row  wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="col-sm-6">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required="required">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
          </div>
          <a class="btn-send col-md-12 col-sm-12 col-xs-12" href="#">Send Now</a>
        </form>
      </div>
    </div>
  </div>
</section>
<footer id="footer">
  <div class="bg-sec">
    <div class="container">
      <h2>LOOKING FORWARD TO <strong>HEARING </strong>FROM YOU!</h2>
    </div>
  </div>
</footer>
<footer id="footer-down">
  <h2>Follow Us On</h2>
  <ul class="social-icon">
    <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
    <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li class="google-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
    <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
    <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
  </ul>
  <p> &copy; Copyright 2016 Cosmix - Created By : <a href="http://templatestock.co" target="_blank">Template Stock</a> </p>
</footer>
<!--Jquery-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<!--Isotopes-->
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="js/wow.js"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/jquery.inview.min.js"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="js/owl.carousel.js"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
