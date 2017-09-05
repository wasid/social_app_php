<?php
ob_start(); // starts output on buffering
session_start();
$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost", "root", "", "fb_clone");

if (mysqli_connect_errno()) {
    
    echo "Failed to connect: " . mysqli_connect_errno();
    
}

?>