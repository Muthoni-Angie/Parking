<?php

            $hostname="localhost";
            $db="tecuri_pms";
            $Username="tecuri_qwerty";
            $Password="qwerty2020@";
            
            $conn=new PDO("mysql:host=$hostname;dbname=$db",$Username,$Password);

$db_config = mysqli_select_db($connection,$db_name);

if($db_config)
{
    echo "db connected";
}
else
{
    echo "db not connected";
}
?>