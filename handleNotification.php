<?php
// Save this code in handleNotification.php
// Configure the callback URL for your product (incoming sms, ussd, voice e.t.c)
// to point to the location of this script on the web
// e.g http://www.myawesomesite.com/handleNotification.php
// Read in a couple of POST variables passed in with the request
$sessionId    = $_POST["sessionId"];
$phoneNumber  = $_POST["phoneNumber"];

// You can then log the notification details to the console or
// store them in a database for your records or
// perform any extra logic your application needs.
echo $sessionId;
echo $phoneNumber;
?>