<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "tecuri_qwerty", "qwerty2020@", "tecuri_pms");

 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$phone = $mysqli->real_escape_string($_REQUEST['phone']);
$subject = $mysqli->real_escape_string($_REQUEST['subject']);
$message = $mysqli->real_escape_string($_REQUEST['message']);
 
// Attempt insert query execution
$sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES ('$name','$email','$phone','$subject','$message')";
if($mysqli->query($sql) === true){
    
echo '<script type="text/javascript">'; 
echo 'alert("Message sent successfully, we will get back to you shortly!");'; 
echo 'window.location.href = "contact.php";';
echo '</script>';
    
    
    
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
$mysqli->close();
?>

