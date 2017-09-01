<?php
$con = mysqli_connect("localhost", "root", "", "fb_clone");

if (mysqli_connect_errno()) {
    
    echo "Failed to connect: " . mysqli_connect_errno();
    
}

?>
<html>
    <head>
        <title>Welcome To Fb Clone!</title>
    </head>
    <body>
    <?php
    
    echo 'Hello world!';
    
    ?>
    <a href="/register.php">Register Page</a>
    </body>
</html>