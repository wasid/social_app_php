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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>