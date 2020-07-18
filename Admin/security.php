<?php
session_start();

include('database/dbconfig.php');

if($dbconfig)
{
    //echo "connected";
}
else
{
    header ("Location: database/dbconfig.php");
}

if(!$_SESSION['username'])
{
    header('Locaton: login.php');
}
?>