<?php
// /* Database credentials. Assuming you are running MySQL
// server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tecuri_qwerty');
define('DB_PASSWORD', 'qwerty2020@');
define('DB_NAME', 'tecuri_pms');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // $hostname="localhost";
            // $db="tecuri_pms";
            // $Username="tecuri_qwerty";
            // $Password="qwerty2020@";
            
            // $conn=new PDO("mysql:host=$hostname;dbname=$db",$Username,$Password);
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }


?>