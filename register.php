<?php
$con = mysqli_connect("localhost", "root", "", "fb_clone");

if (mysqli_connect_errno()) {
    
    echo "Failed to connect: " . mysqli_connect_errno();
    
}

// Form variables

$fname = "";
$lname = "";
$email = "";
$email2 = "";
$pass = "";
$pass2 = "";
$date = "";
$error_array = "";

if (isset($_POST['reg_button'])) {
    
    // First Name
    $fname = strip_tags($_POST['reg_fname']); // remove html tags
    $fname = str_replace(' ', '', $fname); // remove spaces
    $fname = ucfirst(strtolower($fname)); // uppercase first latter
    
    // Last Name
    $lname = strip_tags($_POST['reg_lname']); // remove html tags
    $lname = str_replace(' ', '', $lname); // remove spaces
    $lname = ucfirst(strtolower($lname)); // uppercase first latter
    
    // Email
    $email = strip_tags($_POST['reg_email']); // remove html tags
    $email = str_replace(' ', '', $email); // remove spaces
    $email = strtolower($email); // uppercase first latter
    
    // Email2
    $email2 = strip_tags($_POST['reg_email2']); // remove html tags
    $email2 = str_replace(' ', '', $email2); // remove spaces
    $email2 = strtolower($email2); // uppercase first latter

    // Pass
    $pass = strip_tags($_POST['reg_pass']); // remove html tags
    
    // Pass2
    $pass2 = strip_tags($_POST['reg_pass2']); // remove html tags
    
    $date = date("Y-m-d");
    
    if ($email == $email2) {
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email' ");
            
            $e_num_row = mysqli_num_rows($e_check);
            
            if ($e_num_row > 0) {
                echo "$email email is already taken!";
            }
            else {
                echo "$email is a valid email address!";
            }
        }
        else {
            echo "$email is not a valid email address!";
        }
    }
    else {
        echo "Emails do not match!";
    }
    
    if (strlen($fname) > 25 || strlen($fname) < 2) {
        echo "First name must be between 2 to 25 characters!";
    }
    
    if (strlen($lname) > 25 || strlen($lname) < 2) {
        echo "Last name must be between 2 to 25 characters!";
    }
    
    if ($pass != $pass2) {
        echo "Password do not match!";
    }
    else {
        if (preg_match('/[^A-Za-z0-9]/', $pass)) {
            echo "Password can only contain english characters or numbers!";
        }
    }
    
    if (strlen($pass) > 30 || strlen($pass) < 5) {
        echo "Password must be between 5 to 30 characters!";
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome To Fb Clone!</title>
    </head>
    <body>
        <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" required/>
            <br>
            <input type="text" name="reg_lname" placeholder="Last Name" required/>
            <br>
            <input type="email" name="reg_email" placeholder="Email" required/>
            <br>
            <input type="email" name="reg_email2" placeholder="Confirm Email" required/>
            <br>
            <input type="password" name="reg_pass" placeholder="Password" required/>
            <br>
            <input type="password" name="reg_pass2" placeholder="Confirm Password" required/>
            <br>
            <input type="submit" name="reg_button" value="Submit"/>
        </form>
    </body>
</html>