<?php
require "config/config.php";

if (isset($_SESSION["username"])) {
    $userLoggedin = $_SESSION["username"];
}
else {
    header("Location: register.php");

}

?>
<html>
    <head>
        <title>Welcome To Fb Clone!</title>
        <!--CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
        <!--JS-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="top_bar">
            <div class="logo">
                <a href="index.php">FB Clone</a>
            </div>
        </div>