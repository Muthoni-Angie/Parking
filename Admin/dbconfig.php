<?php

$server_name = "localhost";
$db_username = "tecuri_qwerty";
$db_password = "qwerty2020@";
$db_name ="tecuri_pms";

$connection = mysqli_connect($server_name,$db_username,$db_password);
$db_config = mysqli_select_db($connection,$db_name);

if($db_config)
{
    //echo "db connected";
}
else
{
    //echo "db not connected";
}
?>