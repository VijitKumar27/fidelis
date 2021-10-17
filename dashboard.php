<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>FIDELIS - Aware, Beware & Beyond</title>
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
<!--  -->

<div class="container">
  <h3>Choose location:</h3>
  <div class="tab-content">
    <form action="/add/clients" method="post">

      <div class="field-wrap">
      
        <label>Choose the state<span class="req">*</span>
          <select name="country" onchange="displayCountry(this.value)">
            <option selected= "--">--</option>
            <option value= "Karnataka" >Karnataka</option>
            <option value= "Delhi" >Delhi</option>
            <option value= "Kerala"  >Kerala</option>
          </select>
        </label>
        <br>
</br>
        <div id="Karnataka" style="display:none;"><br/>
          Select District<span class="req">*</span>
          <select name="province" onchange="displayProvince(this.value)">
            <option selected= "--">--</option>
            <option value= "Bangalore" >Bangalore</option>
            <option value= "Tumkur">Tumkur</option>
          </select>
        </div>

        <div id="Kerala" style="display:none;"><br/>
          Select District<span class="req">*</span>
          <select name="province" onchange="displayProvince(this.value)">
            <option selected= "--">--</option>
            <option value= "Kochi" >Kochi</option>
            <option value= "Pallakad">Pallakad</option>
          </select>
        </div>

        <div id="Delhi" style="display:none;"><br/>
          Select District<span class="req">*</span>
          <select name="province" onchange="displayProvince(this.value)">
            <option selected= "--">--</option>
            <option value= "Lakshmipuram" >Lakshmipuram</option>
            <option value= "ChandniChowk">ChandniChowk</option>
          </select>
        </div>

      </div>
    </form>
  </div>
</div>



<section id="contact">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>REPORT <span>EVENT</span></h2>
        <div class="line"></div>
        <p><span><strong>NOTE: </strong></span>If you want to alert the rest of your members or post an update, use this feature.</p>
      </div>
    </div>
    <div class="text-center">
      
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
          <a class="btn-send col-md-12 col-sm-12 col-xs-12" onclick = window.alert("Alert generated") href = "dashboard.php">ALERT NOW</a>
</br>
</br>

        </form>
</br>
</br>
</br>
</br>
</br>



      </div>
    </div>
  </div>
</section>




<script src = "js/district.js"></script>


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
