<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>Parking Management System</title>
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <meta content="" name="keywords">
          <meta content="" name="description">
          <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
          <!-- Favicons -->
          <link href="img/favicon.png" rel="icon">
          <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        
          <!-- Google Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
          <link href = "https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap"rel="stylesheet">
        
          <!-- Bootstrap CSS File -->
          <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
          <!-- Libraries CSS Files -->
          <link href="lib/animate/animate.min.css" rel="stylesheet">
          <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
          <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
          <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
        
          <!-- Main Stylesheet File -->
          <link href="css/styleee.css" rel="stylesheet">
          
        
          
        </head>
        
        <body>
        
          <!--==========================
            Header
          ============================-->
        <header id="header">
            <div class="container">
                <div id="" class="pull-left">
                    <h1>PMS</h1>
                </div>
            <div class ="pull-right">
                <nav id="nav-menu-containerr">
                    <ul class="nav-menu">
                          <li class="menu-active"><a href="booking.php" class="">Home</a></li>
                          <li><a href="#about"class="">About Us</a></li>
                          <li><a href="#features"class="">Parking Zones & Pricing </a></li>          
                          <li><a href="book-parking.php"class="">Book Now</a></li>
                          <li><a href="contact.php" class="">Contact Us</a></li>
                        <li class = "dropdown"><a href="" name="logout_btn" class="dropdown-toggle">Welcome, Evans_Mungai<b class = "caret"></b></a>
                            <ul class = "dropdown-menu">
                                <li><a href="book-parking.php"><i class = "icon-key"></i>Book Now</a></li>
                                <li><a href="logout.php"><i class = "icon-off"></i>Sign Out</a></li>
                            </ul>
                        </li>        
                    </ul>      
            </div>            
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->
        
          <!--==========================
            Intro Section
          ============================-->
          <section id="intro">
        
            <div class="intro-text">
              <h2>We offer cashless car parking services in town.</h2>
              <p>Book Your Parking Space Now</p>
              <a href="book-parking.php" class="btn-get-started scrollto">Get Started</a>
            </div>
          </section><!-- #intro -->
        
    <main id="main">
        
            <!--==========================
              About Us Section
            ============================-->
            <section id="about" class="section-bg">
              <div class="container-fluid">
                <div class="section-header">
                  <h3 class="section-title">About Us</h3>
                  <span class="section-divider"></span>
                  <p class="section-description">
                    How it Works</p>
                </div>
        
            <div class="row">
                <div class="col-lg-6 about-img wow fadeInLeft">
                        
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                    <img  src="images/pa.jpg" alt="">
                                </div>
                            <div class="carousel-item">
                                <img  src="images/par.jpg" alt="">
                            </div>
                            <div class="carousel-item">
                                <img  src="images/intro-bg.jpg" alt="">
                            </div>
                        </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>    
            
        
                  <div class="col-lg-6 content wow fadeInRight">
                    <h2>Discover amazing spaces</h2>
                    <p>Find parking anywhere, for now or for later </p>
                    <p>Compare prices & pick the place that’s best for you</p>
                    <h2>Compare,Book!</h2>
                    <p>See prices, distance, customer reviews...</p>
                    <h2>And Park!</h2> 
                    <p>Guaranteed place upon arrival, just show your booking in the car park.</p>
                    <p>You don't have to print anymore! All your bookings on our site </p>
        
                  </div>
                </div>
        
              </div>
            </div>
            </section><!-- #about -->
        
            <!--==========================
              Product Featuress Section
            ============================-->
            <section id="features">
              <div class="container">
        
                <div class="row">
        
                  <div class="col-lg-12 offset-lg-12">
                    <div class="section-header wow fadeIn" data-wow-duration="1s">
                      <h3 class="section-title">Parking Zones & Fees</h3>
                      <span class="section-divider"></span>
                      <p class ="centered"> We wish to inform all our esteemed customers that effective 1st June 2020, parking fee will be charged at a standard rate of Ksh.200 </p>
                      <p class = "centered">Not sure of where you are? Click on the parking zones to get your directions</p>
                    </div>
                  </div>
                  <table class="table table-bordered table-dark table-hover">
                  <tbody>
                    <tr>
                      <td><b>Parking Zones</b></td>    
                      <td><a href="#exampleModalCenter"  data-toggle="modal" data-target="#exampleModalCenter">  <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>CBD</a></td>
                      <td><a href="#exampleModalCenter1" data-toggle="modal" data-target="#exampleModalCenter1"> <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>LANGATA</a></td>
                      <td><a href="#exampleModalCenter2" data-toggle="modal" data-target="#exampleModalCenter2"> <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>LAVINGTON</a></td>
                      <td><a href="#exampleModalCenter3" data-toggle="modal" data-target="#exampleModalCenter3"> <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>HURLINGHAM</a></td>
                      <td><a href="#exampleModalCenter4" data-toggle="modal" data-target="#exampleModalCenter4"> <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>KILIMANI</a></td>
                      <td><a href="#exampleModalCenter5" data-toggle="modal" data-target="#exampleModalCenter5"> <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>PARKLANDS</a></td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr>
                      <td><b>Street/Road</b></td>
                      <td>Haille Selassie <br>
                          Moi Avenue<br>
                          Kenyataa Avenue<br>
                          Mama Ngina</td>
                      <td>Shopping Center</td>
                      <td>Shopping Center</td>
                      <td>Shopping Center</td> 
                      <td>Shopping Center</td> 
                      <td>Shopping Center</td>     
                    </tr>
                  </tbody>
                </table>
        
                <script>
                  highlight_row();
                  function highlight_row() {
                    var table = document.getElementById('display-table')
                  }
                </script>
                    </div>
        
                  </div>
        
                </div>
        
              </div>
        
            </section><!-- #features -->
        

            <!-- Modal CBD -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">CBD MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                          <iframe src= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.256232723057!2d36.81483586626585!3d-1.2855640825951251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d714b90b4d%3A0xf58d8f9b297c294c!2sCentral%20Business%20District%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593024719439!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" style="height: 333px; width: 469px" frameborder="0"
                            style="border:0" allowfullscreen></iframe>
                        </div>
                        
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
            
             <!-- Modal LANGATA -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">LANGATA MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63819.00068652602!2d36.70124932138386!3d-1.364142986814158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f04e2529bcab3%3A0xb85155f9a25aa4c0!2sLangata%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032556066!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
            
             <!-- Modal LAVINGTON -->
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">LAVINGTON MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31910.599244465906!2d36.76404007537169!3d-1.2786020351290388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f19f7e205e1d1%3A0x8ec37f283d52eb04!2sLavington%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032636911!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
            
             <!-- Modal Hurlingham -->
            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">HURLINGHAM MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.800232113416!2d36.79629721410114!3d-1.2943836359985343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10be736d3fd9%3A0x326339c4a0b2ad07!2sHurlingham%20Court%2C%20Argwings%20Kodhek%20Rd%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032707753!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
            
             <!-- Modal KILIMANI-->
            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">KILIMANI MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31910.513393397945!2d36.77978982537387!3d-1.2854898349231563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a0dfd90fa55%3A0x37f5057a6f21bc7c!2sKilimani%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032754184!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
                    
                    
             <!-- Modal PARKLANDS -->
            <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><a href="book-parking.php">PARKLANDS MAP</a></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <!--Google map-->
                        <div id="map-container-google-1" class="z-depth-1-half map-container" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.40802006562!2d36.80806601626392!3d-1.2610411826770205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f17199c297e71%3A0x7019c24cbb4896d4!2sParklands%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1593032791198!5m2!1sen!2ske" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        
                    <!--Google Maps-->
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
        
    </main>
          
          <!-- Footer -->
        <footer class="page-footer font-small blue">
        
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href=""> Parking Management System</a>
          </div>
          <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
        
         
          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
          <!-- JavaScript Libraries -->
          <script src="lib/jquery/jquery.min.js"></script>
          <script src="lib/jquery/jquery-migrate.min.js"></script>
          <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="lib/easing/easing.min.js"></script>
          <script src="lib/wow/wow.min.js"></script>
          <script src="lib/superfish/hoverIntent.js"></script>
          <script src="lib/superfish/superfish.min.js"></script>
          <script src="lib/magnific-popup/magnific-popup.min.js"></script>
        
          <!-- Contact Form JavaScript File -->
          <script src="contactform/contactform.js"></script>
        
          <!-- Template Main Javascript File -->
          <script src="js/main.js"></script>
          
        
        
        </body>
        </html>
