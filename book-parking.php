<?php
            session_start();
            if(!isset($_SESSION['username'])){
            header('location: login.php');
            }
            
            $hostname="localhost";
            $db="tecuri_pms";
            $Username="tecuri_qwerty";
            $Password="qwerty2020@";
            
            $conn=new PDO("mysql:host=$hostname;dbname=$db",$Username,$Password);
            
            // if (isset($_POST['submit']))
            // {
            //     $to = "a.muthoni17@gmail.com"; // this is your Email address
            //     $from = $_POST['email']; // this is the sender's Email address
            //     $first_name = $_POST['first_name'];
            //     $last_name = $_POST['last_name'];
            //     $subject = "Form submission";
            //     $subject2 = "Copy of your form submission";
            //     $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
            //     $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
            
            //     $headers = "From:" . $from;
            //     $headers2 = "From:" . $to;
            //     mail($to,$subject,$message,$headers);
            //     mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
            //     echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
            //     // You can also use header('Location: thank_you.php'); to redirect to another page.
            //     // You cannot use header and echo together. It's one or the other.
                
            // }
            
            $existing_slot = $conn->prepare("SELECT parkingslot FROM `park`");
            $existing_slot->execute(['parkingslot']); 
            
            $bookedSlot= array();
            while($slot = $existing_slot->fetch()){
                array_push($bookedSlot, $slot['parkingslot']);
            }
            
                // Start of mpesa processing
                
                $shortcode='174379';
                $consumerkey    ="8uG9GlMqxCTxJZOl3KcMFSYzZdtGpACW";
                $consumersecret ="DXDM99Fju76Tm0VD";
                $authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                // new code line here
                //$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                $curl =curl_init($access_token_url);
                $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
                
                
                
                $passkey="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
                
                
                
                $credentials= base64_encode($consumerkey.':'.$consumersecret);
                $username=$consumerkey ;
                $password=$consumersecret;
                
                // // Request headers
                $headers = array(  
                  'Content-Type: application/json; charset=utf-8'
                );
            
            
            
            
            
            
            // if(isset($_POST['submit']))
            if(isset($_POST['submit']))
            {
             
              $phoneNumber=$_POST['pay'];
            
                 // Request
                 $ch = curl_init($authenticationurl);
                 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                 curl_setopt($ch, CURLOPT_HEADER, FALSE); 
                 curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password); 
                 //new code here too
                 //$result = curl_exec($curl);
                 $result = curl_exec($ch);  
                 $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
                 $result = json_decode($result);
                 $access_token=$result->access_token;
                 //new code here
                //$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
                 curl_close($ch);
            
            
                
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); 
                
                
                // echo date_format($date, 'Y-m-d H:i:s');
                $date = date('YmdHis', time());
                
                $passwordNow= base64_encode($shortcode.$passkey.$date);
                $curl_post_data = array(
              //Fill in the request parameters with valid values
                "BusinessShortCode"=> $shortcode,
            	"Password"=>  $passwordNow,
            	"Timestamp"=>  $date,
            	"TransactionType"=> "CustomerPayBillOnline",
            	"Amount"=>  "1",
            	'PartyA' => $phoneNumber,
                'PartyB' => $shortcode,
                'PhoneNumber' => $phoneNumber,  
            	'CallBackURL' => 'https://tecurityafrica.com/push_stk.php',
                'AccountReference' => 'Parking Management System',
                'TransactionDesc' => ' Parking Spot'
            );
            
            
                $data_string = json_encode($curl_post_data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                
                $curl_response = curl_exec($curl);
            
              $parkingzone=$_POST['parkingzone'];
              $streetroad=$_POST['streetroad'];
              $codeid=$_POST['codeid'];
              $datetimepicker1=$_POST['datetimepicker1'];
              $datetimepicker2=$_POST['datetimepicker2']; 
              $parkingslot=$_POST['parkingslot']; 
              $fname=$_POST['fname'];
              $lname=$_POST['lname'];
              $email=$_POST['email'];
              $iden=$_POST['iden'];
              $carreg=$_POST['carreg'];
              $pay=$_POST['pay'];
            
            $existing_slot = $conn->prepare("SELECT parkingslot FROM `park` WHERE parkingslot = ?");
            $existing_slot->execute([$parkingslot]); 
            $slot = $existing_slot->fetch();
             
            if ($slot) {
                echo "Slot has been taken";
              } else {
              
              
              
              
              $sql_connection = mysqli_connect($hostname, $Username, $Password, $db);
            
              
              if (!$sql_connection) {
                  die("Connection failed: " . mysqli_connect_error());
            }
             
              
              $sql = "INSERT INTO park (parkingzone,streetroad,codeid,datetimepicker1,datetimepicker2,parkingslot,fname,lname,email,iden,carreg,pay) 
              VALUES ('$parkingzone','$streetroad','$codeid','$datetimepicker1','$datetimepicker2','$parkingslot','$fname',' $lname','$email','$iden',' $carreg','$pay')";
            if (mysqli_query($sql_connection, $sql)) {
                  //echo "New record created successfully";
                  
            echo '<script type="text/JavaScript">  
                alert("Please make your Mpesa Payment!")
                 </script>' ; 
                 
              
                
            } else {
                //   echo "Error: " . $sql . "<br>" . mysqli_error($sql_connection);
            }
            mysqli_close($sql_connection);
            

              }
            
             
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
            
               <!--Favicons -->
              <link href="img/favicon.png" rel="icon">
              <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
            
               <!--Google Fonts -->
              <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
            
               <!--Bootstrap CSS File g-->
              <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
              <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
            
               <!--Libraries CSS Files -->
              <link href="lib/animate/animate.min.css" rel="stylesheet">
              <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
              <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
              <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
            
               <!--Main Stylesheet File -->
              <link href="css/sty.css" rel="stylesheet">
            
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            
            
            
            
                 <script>
                            var stateObject = {
                            "CBD": { "Haile Selassie": ["CBD-HailAv"],
                            "Moi Avenue": ["CBD-MoiAv"],
                            "Kenyatta Avenue": ["CBD-KenAv"],
                            "Mama Ngina": ["CBD-MnAv"],
                            },
                            "Langata": {
                            "Shopping Center": ["Lang-SC"]
                            }, 
                            "Lavington": {
                            "Shopping Center": ["Lavi-SC"]
                            }, 
                            "Hurlingham": {
                            "Shopping Center": ["Hurli-SC"]
                            }, 
                            "Kilimani": {
                            "Shopping Center": ["Kil-SC"]
                            }, 
                            "Parklands": {
                            "1st Avenue": ["Par-1Av"]
                            },
                            }
                            window.onload = function () {
                            var countySel = document.getElementById("countySel"),
                            stateSel = document.getElementById("stateSel"),
                            districtSel = document.getElementById("districtSel");
                            for (var country in stateObject) {
                            countySel.options[countySel.options.length] = new Option(country, country);
                            }
                            countySel.onchange = function () {
                            stateSel.length = 1; // remove all options bar first
                            districtSel.length = 1; // remove all options bar first
                            if (this.selectedIndex < 1) return; // done 
                            for (var state in stateObject[this.value]) {
                            stateSel.options[stateSel.options.length] = new Option(state, state);
                            }
                            }
                            countySel.onchange(); // reset in case page is reloaded
                            stateSel.onchange = function () {
                            districtSel.length = 1; // remove all options bar first
                            if (this.selectedIndex < 1) return; // done 
                            var district = stateObject[countySel.value][this.value];
                            for (var i = 0; i < district.length; i++) {
                            districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
                            }
                            }
                            }
                            </script>

            </head>
            
    <body>
        <div class = "container">
            <div class=" row ">
                    <div class="col-lg-12">
                            <header id="header">
                                <div class="container">
                                      <div id="logo" class="pull-left">
                                        <h1><a href="#intro" class="scrollto">Parking System</a></h1>
                                         <a href="#intro"><img src="img/logo.png" alt="" title=""></a> 
                                      </div>
                                    <nav id="nav-menu-containerr"  >
                                        <ul class="nav-menu navbar-right">
                                          <li class="menu-active"><a href="booking.php" class="btn btn-success">HOME</a></li>
                                          <li><a href="booking.php"class="btn btn-success">ABOUT US</a></li>
                                          <li><a href="booking.php"class="btn btn-success">PARKING ZONES & PRICING </a></li>          
                                          <li><a href="book-parking.php"class="btn btn-success">BOOK NOW</a></li>
                                          <!--<li><a href=""class="btn btn-success">My Account</a></li>-->
                                          <li><a href="contact.php" class="btn btn-success">CONTACT US</a></li>
                                          <li class = "nav-item dropdown btn btn-danger">
                                              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"href="logout.php" class="btn btn-danger">MY ACCOUNT</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                  <a class="dropdown-item" href = "#exampleModalCenter" data-target="#exampleModalCenter" data-toggle="modal">My Bookings</a>
                                                  <!--<a class="dropdown-item" href="logout.php">My Account</a>-->
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="logout.php">Sign Out</a>
                                                </div>
                                              </li>
                                          </ul>
                                        
                                    </nav>
                                </div>
                            </header>
                    </div>
                </div>
            </div>
                            
    <section id="intro">
                  <br> 
<div class = "section">
    <div class="section-center">            
        <div class = "container">
            <div class="row">
                <div class = "col-md-2">
                    <div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Fill in the forrm to book your parking space now in our various regions within the city!</p>
						</div>
                    
                </div>
                    <div class="col-md-8 col-md-offset-1">
                        <div class = "container" style="background: rgba(0,0,0,0.7) ;padding:34px" >
                            
                            <p>BOOKING DETAILS</p>
                                <div class = "px-2">
                                    <form class="justify-content-center"  method="post" id="regForm">
                                        <div class = "tab">
                                                  <label>Select Parking Zone</label>
                                                  <select name="parkingzone" class="form-control" id="countySel" size="1" required>
                                                  <option value="" selected="selected">Select</option>
                                                  </select>
                                                  
                                                  <label>Select Street/ Road</label>
                                                  <select name="streetroad" class="form-control"id="stateSel" size="1">
                                                  <option value="" selected="selected">Please select street road</option>
                                                  </select>
                                                  
                                                <label>Select Code/ID</label>
                                                <select name="codeid" class="form-control" id="districtSel" size="1">
                                                <option value="" selected="selected">Please select Code/ID</option>
                                                </select>
                                                
                                                <label>Start Date & Time</label>
                                                <div class='input-group date' id='datetimepicker1'>
                                                <input type="text" id="datetimepicker1" name="datetimepicker1"class="form-control" placeholder="choose start date and time">
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                </div>
                                                <label>End Date & Time</label>
                                                <div class='input-group date' id='datetimepicker2'>
                                                <input type="text" id="datetimepicker2" name="datetimepicker2"class="form-control" placeholder="choose start date and time">
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                </div>
                                            </div>  
                                        <div class = "tab"> 
                                            <!--<label>Click to book your parking spot now!</label>-->
                                            <!--<h2>Click to select a booking spot</h2>-->
                                            <input class="" type="hidden" name="parkingslot" id="parkingslot" placeholder="select parking spot below">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                      <td id="p1" style="background-color:<?php echo (in_array('p1', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p1')"><img src="images/parking-image.jpg" height="50%" width="auto">01</td>
                                                      <td id="p2" style="background-color:<?php echo (in_array('p2', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p2')"><img src="images/parking-image.jpg" height="50%" width="auto">02</td>
                                                      <td id="p3" style="background-color:<?php echo (in_array('p3', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p3')"><img src="images/parking-image.jpg" height="50%" width="auto">03</td>
                                                      <td id="p4" style="background-color:<?php echo (in_array('p4', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p4')"><img src="images/parking-image.jpg" height="50%" width="auto">04</td>
                                                      <td id="p5" style="background-color:<?php echo (in_array('p5', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p5')"><img src="images/parking-image.jpg" height="50%" width="auto">05</td>
                                                      <td id="p6" style="background-color:<?php echo (in_array('p6', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p6')"><img src="images/parking-image.jpg" height="50%" width="auto">06</td>
                                                      <td id="p7" style="background-color:<?php echo (in_array('p7', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p7')"><img src="images/parking-image.jpg" height="50%" width="auto">07</td>               
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                      <td id="p8" style="background-color:<?php echo (in_array('p8', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p8')"><img src="images/parking-image.jpg" height="50%" width="auto">08</td>
                                                      <td id="p9" style="background-color:<?php echo (in_array('p9', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p9')"><img src="images/parking-image.jpg" height="50%" width="auto">09</td>
                                                      <td id="p10" style="background-color:<?php echo (in_array('p10', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p10')"><img src="images/parking-image.jpg" height="50%" width="auto">10</td>
                                                      <td id="p11" style="background-color:<?php echo (in_array('p11', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p11')"><img src="images/parking-image.jpg" height="50%" width="auto">11</td>
                                                      <td id="p12" style="background-color:<?php echo (in_array('p12', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p12')"><img src="images/parking-image.jpg" height="50%" width="auto">12</td> 
                                                      <td id="p13" style="background-color:<?php echo (in_array('p13', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p13')"><img src="images/parking-image.jpg" height="50%" width="auto">13</td>
                                                      <td id="p14" style="background-color:<?php echo (in_array('p14', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p14')"><img src="images/parking-image.jpg" height="50%" width="auto">14</td>   
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                      <td id="p15" style="background-color:<?php echo (in_array('p15', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p15')"><img src="images/parking-image.jpg" height="50%" width="auto">15</td>
                                                      <td id="p16" style="background-color:<?php echo (in_array('p16', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p16')"><img src="images/parking-image.jpg" height="50%" width="auto">16</td>
                                                      <td id="p17" style="background-color:<?php echo (in_array('p17', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p17')"><img src="images/parking-image.jpg" height="50%" width="auto">17</td>
                                                      <td id="p18" style="background-color:<?php echo (in_array('p18', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p18')"><img src="images/parking-image.jpg" height="50%" width="auto">18</td>
                                                      <td id="p19" style="background-color:<?php echo (in_array('p19', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p19')"><img src="images/parking-image.jpg" height="50%" width="auto">19</td> 
                                                      <td id="p20" style="background-color:<?php echo (in_array('p20', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p20')"><img src="images/parking-image.jpg" height="50%" width="auto">20</td> 
                                                      <td id="p21" style="background-color:<?php echo (in_array('p21', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p21')"><img src="images/parking-image.jpg" height="50%" width="auto">21</td>     
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                  <td id="p22" style="background-color:<?php echo (in_array('p22', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p22')"><img src="images/parking-image.jpg" height="50%" width="auto">22</td>
                                                  <td id="p23" style="background-color:<?php echo (in_array('p23', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p23')"><img src="images/parking-image.jpg" height="50%" width="auto">23</td>
                                                  <td id="p24" style="background-color:<?php echo (in_array('p24', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p24')"><img src="images/parking-image.jpg" height="50%" width="auto">24</td>
                                                  <td id="p25" style="background-color:<?php echo (in_array('p25', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p25')"><img src="images/parking-image.jpg" height="50%" width="auto">25</td>
                                                  <td id="p26" style="background-color:<?php echo (in_array('p26', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p26')"><img src="images/parking-image.jpg" height="50%" width="auto">26</td> 
                                                  <td id="p27" style="background-color:<?php echo (in_array('p27', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p27')"><img src="images/parking-image.jpg" height="50%" width="auto">27</td> 
                                                  <td id="p28" style="background-color:<?php echo (in_array('p28', $bookedSlot) ? 'red' : 'white'); ?>" onClick="content('p28')"><img src="images/parking-image.jpg" height="50%" width="auto">28</td>    
                                                </tr>
                                                </tbody>
                                            </table>
                            </div>
                                        <div class = "tab"> <p align ="center"> User Details:</p>
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input class="form-control" type = "text" placeholder="First name..." name="fname" id ="fname">
                                        </div>
                                        
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                           <input class="form-control" type = "text" placeholder="Last name..."  name="lname" id= "lname">
                                        </div
                                        
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                           <input class="form-control" type = "email" placeholder="Email..."  name="email" id ="email">
                                        </div
                                        
                                        <label>ID/Passport No.</label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                           <input class="form-control" type = "text" placeholder="ID/Passport No..." name="iden" id = "iden">
                                        </div
                                        <label>Car Registration No.</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>
                                            </span>
                                           <input class="form-control"type = "text" placeholder="Car Registration..."name="carreg" id="carreg">
                                        </div
                                        
                                        </div>
                                        
                            </div>
                                        <!--<div class = "tab"> <p align ="center"> Mpesa Payment Details:</p>                                                <div class = "row justify-content-">-->
                                        <!--            <label>Phone Number</label><input class = "form-control" type = "tel" placeholder="Format: 254700000000"  name="pay" id = "pay">-->
                                        <!--        <input type="submit"  name = "submit" value = "submit">-->
                                        <!--        </div>-->
                                            
                                        <!--</div>-->
                                        
                                    <div class = "tab">
                                        <div class = "container">
                                            <div class="row">
                                                <div class="col">
                                                    <div class = "form-group">
                                                        <div class = "col">
                                                              <label>MPESA</label>&nbsp;&nbsp;
                                                              <input class ="checkbox" type="checkbox">
                                                        </div>
                                                    </div>
                                                  <div class = "col-md-8 box" style = "display:none;">
                                                      <input  class = "form-control" type = "tel" placeholder="Format: 254700000000"  name="pay" id = "pay">
                                                  </div>
                                                </div>
                                                <div class="col">
                                                  <div class = "form-group">
                                                        <div class = "col">
                                                              <label>CREDIT CARD</label>&nbsp;&nbsp;
                                                              <input class ="checkbox" type="checkbox">
                                                        </div>
                                                    </div>
                                                  <!--<div class = "col-md-8 box"  data-box="box" style = "display:none;">-->
                                                  <!--    <input class = "form-control" type = "Number" placeholder="Valid card number"  name="" id = ""> <br>-->
                                                  <!--    <input class = "form-control" type = "date" placeholder="expiry date"  name="" id = ""><br>-->
                                                  <!--    <input class = "form-control" type = "number" placeholder="cvv code"  name=" " id = ""><br>-->
                                                  <!--    <input class = "form-control" type = "number" placeholder=""  name="" id = ""><br>-->
                                                  <!--</div>-->
                                                  <div class = "row">
                                                      <div class ="col-md-8">
                                                          <input  class = "form-control" type = "tel" placeholder="Enter Card Number">
                                                      </div>
                                                  </div>
                                                  <br>
                                                    <div class = "row">
                                                          <div class = "col-md-3 col-sm-3 col-xs-3">
                                                              <span class = "help-block text-muted small-font">Expiry Month</span>
                                                              <input class = "form-control" type = "text" placeholder="MM"/>
                                                          </div>
                                                          <div class = "col-md-3 col-sm-3 col-xs-3">
                                                              <span class = "help-block text-muted small-font">Expiry Year</span>
                                                              <input class = "form-control" type = "text" placeholder="YY"/>
                                                          </div>
                                                          <div class = "col-md-2 col-sm-2 col-xs-2">
                                                              <span class = "help-block text-muted small-font">CCV</span>
                                                              <input class = "form-control" type = "text" placeholder="CCV"/>
                                                          </div>
                                                          <div class = "col-md-3 col-sm-3 col-xs-3">
                                                              <span class = "help-block text-muted small-font">Expiry Month</span>
                                                              <input class = "form-control" type = "text" placeholder="MM"/>
                                                          </div>
                                                    </div>
                                                    <br>
                                                    <div class = "row">
                                                        <div class = "col-md-8 pad-adjust">
                                                             <input class = "form-control" type = "text" placeholder="Name On The Card"/>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div class =" row"> 
                                            <div class = "row justify-content-center">
                                                <input  class ="btn btn-success" type="submit"  name = "submit" value = "Confirm Payment">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                            <br>
                                            <div style="overflow:auto;">
                                                  <div style="float:right;">
                                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                                  </div>
                                            </div>
                                            <div style="text-align:center;margin-top:40px;">
                                              <span class="step"></span>
                                              <span class="step"></span>
                                              <span class="step"></span>
                                              <span class="step"></span>
                                            </div>
                        </div>
        
                                    <script>
                      function content (slot_number)
                      {
                        var element = document.getElementById(slot_number);
                        element.style.background = 'red';
                        document.getElementById("parkingslot").value=slot_number;
                        //alert  ("Do you want to book this parking slot?")
                        if (confirm("Do you want to book this parking spot?")) {
                          txt = "You pressed OK!";
                            } else {
                              element.style.background = 'white';
                                }  
                                 }
                    
                    </script>
                                    </form>  
                                    <script type="text/javascript">
                                                                $(function () {
                                                                    $('#datetimepicker1').datetimepicker();
                                                                    $('#datetimepicker2').datetimepicker({
                                                                        useCurrent: false //Important! See issue #1075
                                                                    });
                                                                    $("#datetimepicker1").on("dp.change", function (e) {
                                                                        $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                                                                    });
                                                                    $("#datetimepicker2").on("dp.change", function (e) {
                                                                        $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                                                                    });
                                                                });
                                    </script>
                                    
                                    <script>
                                        // $(document).ready(function(){
                                            
                                        //     $(".checkbox").change(function(){
                                                
                                        //         if ($(this).prop("checked")){
                                        //             $(this).parents(".row").find(".box").show();
                                        //         }else{
                                        //             $(this).parents(".row").find(".box").hide();
                                        //         }
                                        //     });
                                        // });
                                        $(document).ready(function(){

                                         $(".checkbox").change(function(){
                                         		
                                          if($(this).prop("checked")){
                                          	$(this).parents(".row").find(".box").show();
                                          }else{
                                          	
                                             $(this).parents(".row").find(".box").hide();
                                          }
                                          });
                                        });
                                       
                                    </script>
                                    
                                    <script>
                                        var currentTab = 0; // Current tab is set to be the first tab (0)
                                        showTab(currentTab); // Display the current tab
                                        
                                        function showTab(n) {
                                          // This function will display the specified tab of the form...
                                          var x = document.getElementsByClassName("tab");
                                          x[n].style.display = "block";
                                          //... and fix the Previous/Next buttons:
                                          if (n == 0) {
                                            document.getElementById("prevBtn").style.display = "none";
                                          } else {
                                            document.getElementById("prevBtn").style.display = "inline";
                                          }
                                          if (n == (x.length - 1)) {
                                            document.getElementById("nextBtn").innerHTML = "Finish";
                                          } else {
                                            document.getElementById("nextBtn").innerHTML = "Next";
                                          }
                                          //... and run a function that will display the correct step indicator:
                                          fixStepIndicator(n)
                                        }
                                        
                                        function nextPrev(n) {
                                          // This function will figure out which tab to display
                                          var x = document.getElementsByClassName("tab");
                                          // Exit the function if any field in the current tab is invalid:
                                          if (n == 1 && !validateForm()) return false;
                                          // Hide the current tab:
                                          x[currentTab].style.display = "none";
                                          // Increase or decrease the current tab by 1:
                                          currentTab = currentTab + n;
                                          // if you have reached the end of the form...
                                          if (currentTab >= x.length) {
                                            // ... the form gets submitted:
                                            document.getElementById("regForm").submit();
                                            return false;
                                          }
                                          // Otherwise, display the correct tab:
                                          showTab(currentTab);
                                        }
                                        
                                        function validateForm() {
                                          // This function deals with validation of the form fields
                                          var x, y, i, valid = true;
                                          x = document.getElementsByClassName("tab");
                                          y = x[currentTab].getElementsByTagName("input");
                                          // A loop that checks every input field in the current tab:
                                          for (i = 0; i < y.length; i++) {
                                            // If a field is empty...
                                            if (y[i].value == "") {
                                              // add an "invalid" class to the field:
                                              y[i].className += " invalid";
                                              // and set the current valid status to false
                                              valid = false;
                                            }
                                          }
                                          // If the valid status is true, mark the step as finished and valid:
                                          if (valid) {
                                            document.getElementsByClassName("step")[currentTab].className += " finish";
                                          }
                                          return valid; // return the valid status
                                        }
                                        
                                        function fixStepIndicator(n) {
                                          // This function removes the "active" class of all steps...
                                          var i, x = document.getElementsByClassName("step");
                                          for (i = 0; i < x.length; i++) {
                                            x[i].className = x[i].className.replace(" active", "");
                                          }
                                          //... and adds the "active" class on the current step:
                                          x[n].className += " active";
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            <br><br>
            
    </div>
</div>
            </section>

            <div class ="container">
                <div class = "row justify-content-md-center"">
                    <div class="col-lg-12">
                        <footer class="page-footer font-small blue">
                        <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href=""> Parking Management System</a>
                        </div>
                    </div>
                </div>
            </div>
                  
                  
                    <!-- My Bookings -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">My bookings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div class="table-responsive">
      <?php
        $connection = mysqli_connect("localhost","tecuri_qwerty","qwerty2020@","tecuri_pms");

        $query = "SELECT * FROM park";
        $query_run = mysqli_query($connection, $query);
      ?>

      <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Parking Zone</th>
            <th>Parking Slot</th>
            <th>Car Reg</th>      
            <!--<th>End Time</th> -->
            <th>Action</th>  
          </tr>
        </thead>
        <tbody>    
      <?php
        if(mysqli_num_rows($query_run) > 0)
      {
        while ($row = mysqli_fetch_assoc($query_run))
        {
         ?>


          <tr>
            <td><?php echo $row['parkingzone'];?></td>
            <td><?php echo $row['parkingslot'];?></td>
            <td><?php echo $row['carreg'];?></td> 
            <!--<td><?php echo $row['datetimepicker1'];?></td>  -->
            <td>
            <form action = "code.php" method="POST">
            <input type = "hidden" name = "delete_id" value = "<?php echo $row['id'];?>">
              <button type="submit" name ="delete_btn"class="btn btn-danger">UNBOOK</button>
            </form>
            </td>
          </tr>  
              <?php
        }
      }
        else {
          echo "No record found";
        }
      ?>              
        </tbody>
      </table>
    </div>
              </div>
              
              
                <div class="modal" id = "myAdvert" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Modal body text goes here.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
            
            </body>
            </html>
               
               