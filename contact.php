<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}

        $servername="localhost";
        $username="tecuri_qwerty";
        $password="qwerty2020@";
        $dbname="tecuri_pms";
            
        $conn = new mysqli($servername, $username, $password, $dbname);

?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Parking Management System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  
  <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Main Stylesheet File -->
  <link href="styl.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

  
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">
      <div class="row">
        <div id="logo" class="pull-left">
          <h1><a href="#" class="scrollto">Parking System</a></h1>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
               <li class="menu-active"><a href="booking.php" class="btn btn-success">Home</a></li>
               <li><a href="booking.php"class="btn btn-success">About Us</a></li>
               <li><a href="booking.php"class="btn btn-success">Parking Zones & Pricing </a></li>          
               <li><a href="book-parking.php"class="btn btn-success">Book Now</a></li>
               <li><a href="contact.php" class="btn btn-success">Contact Us</a></li>
               <li><a href="logout.php" class="btn btn-danger">Sign Out</a></li>
              </ul>
        </nav><!-- #nav-menu-container -->
        </div>
      </div>      
    </div>
  </header><!-- #header -->
  

<section id="intro">
  

<br><br><br><br><br><br>
    <div class="container" style="background:rgba(0,0,0,0.7);padding-top:62px;padding-bottom:50px;padding-right:50px;padding-left:50px;">
        <div class="row justify-content-center">
            <h3 class="mt-2"><i class="fa fa-envelope"></i> Write to us:</h3>
          </div>
        <div class="row">
            <div class="col-8">
                <div class="">
                    <form id="contact-form" name="contact-form" method="post" action ="insert.php">
                    <div class="row">
                        <div class="col-md-12">
                            <!--<div class="form-group">-->
                            <!--    <label for="name">-->
                            <!--        Name</label>-->
                            <!--    <input type="text" class="form-control" name = "name" id = "name" placeholder="Enter name" required="required"/>-->
                            <!--</div>-->
                            <div class="form-group">
                                <label for="email">
                                    Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" class="form-control" name = "name" id="name" placeholder="Enter name" required="required" /></div>
                            </div><div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" name = "email" id="email" placeholder="Enter email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="phone">
                                    Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                    </span>
                                    <input type="tel"  pattern="^\d{3}-\d{3}-\d{3}-\d{3}$" class="form-control" name = "phone" id="phone" placeholder="format: (254-722-000-000)" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required" value="">
                                    <option value="Others" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control"  required="required"
                                    placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs" data-toggle="modal" data-target="#ignismyModal">
                                Send Message</button>
                                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                                <!--  Launch demo modal-->
                                <!--</button>-->
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            <div class="col-4" >
                <div id="map-container-google-1" class="z-depth-1-half map-container" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.800232113416!2d36.79629721410114!3d-1.2943836359985343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10be736d3fd9%3A0x326339c4a0b2ad07!2sHurlingham%20Court%2C%20Argwings%20Kodhek%20Rd%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032707753!5m2!1sen!2ske" width="350px" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                
                <br>
                
            <div class="row text-center">
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fa fa-map-marker"></i>
                  </a><br>
                  Nairobi, 94126
                  Kenya
                </div>
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fa fa-phone"></i>
                  </a><br>
                  +254702755729 &nbsp;
                  Mon - Fri, 8:00-22:00
                </div>
                <div class="col-md-4">
                  <a class="btn-floating blue accent-1">
                    <i class="fa fa-envelope"></i>
                  </a><br>
                  info@gmail.com
                  sale@gmail.com
                </div>
            </div>
            
            <br><br>
            
             <div class="row text-center">
                 
                <div class="col">
                  <!--Facebook-->
               <a class="fa fa-facebook"></a>
                 <!--WhatsApp-->
                <a class="fa fa-linkedin"></a>
                 <!--Twitter-->
                <a class="fa fa-twitter"></a>
                </div>
            </div>

    </div>
            </div>
        </div>
    </div>

    

    

  </section><!-- #intro -->


  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>
