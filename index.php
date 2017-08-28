<?php
$con = mysqli_connect("localhost", "root", "", "fb_clone");

if (mysqli_connect_errno()) {
    
    echo "Failed to connect: " . mysqli_connect_errno();
    
}

?>
<html>
    <body>
    <?php
    
    echo 'Hello world!';
    
    ?>
    </body>
</html>