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
    </head>
    <body>