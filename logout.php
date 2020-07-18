<?php
// Initialize the session
session_start();

session_unset();
// Destroy the session.
session_destroy();

 
// Unset all of the session variables
$_SESSION = array();
 

// Redirect to login page
header('Location: login.php');


exit;


?>