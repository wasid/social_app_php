<?php
require "config/config.php";

if (isset($_SESSION["username"])) {
    $userLoggedin = $_SESSION["username"];
    $user_dedails_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedin'");
    $user=mysqli_fetch_array($user_dedails_query);
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
        <!--JS-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="top_bar">
            <div class="logo">
                <a href="index.php">FB Clone</a>
            </div>
            <nav>
                <a href="#">
                    <?php
                        echo $user['first_name'];
                    ?>
                </a>
                <a href="index.php">
                    <i class="fa fa-home fa-lg"></i>
                </a>
                <a href="#">
                    <i class="fa fa-envelope fa-lg"></i>
                </a>
                <a href="#">
                    <i class="fa fa-bell-o fa-lg"></i>
                </a>
                <a href="#">
                    <i class="fa fa-users fa-lg"></i>
                </a>
                <a href="#">
                    <i class="fa fa-cog fa-lg"></i>
                </a>
            </nav>
        </div>