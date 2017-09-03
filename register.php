<?php
session_start();
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
$error_array = array();

if (isset($_POST['reg_button'])) {
    
    // First Name
    $fname = strip_tags($_POST['reg_fname']); // remove html tags
    $fname = str_replace(' ', '', $fname); // remove spaces
    $fname = ucfirst(strtolower($fname)); // uppercase first latter
    $_SESSION['reg_fname'] = $fname; // storing value to session
    
    // Last Name
    $lname = strip_tags($_POST['reg_lname']); // remove html tags
    $lname = str_replace(' ', '', $lname); // remove spaces
    $lname = ucfirst(strtolower($lname)); // uppercase first latter
    $_SESSION['reg_lname'] = $lname; // storing value to session
    
    // Email
    $email = strip_tags($_POST['reg_email']); // remove html tags
    $email = str_replace(' ', '', $email); // remove spaces
    $email = strtolower($email); // uppercase first latter
    $_SESSION['reg_email'] = $email; // storing value to session
    
    // Email2
    $email2 = strip_tags($_POST['reg_email2']); // remove html tags
    $email2 = str_replace(' ', '', $email2); // remove spaces
    $email2 = strtolower($email2); // uppercase first latter
    $_SESSION['reg_email2'] = $email2; // storing value to session

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
                array_push($error_array, "$email email is already taken!<br>");
            }
            else {
                array_push($error_array, "$email is a valid email address!<br>");
            }
        }
        else {
            array_push($error_array, "$email is not a valid email address!<br>");
        }
    }
    else {
        array_push($error_array, "Emails do not match!<br>");
    }
    
    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "First name must be between 2 to 25 characters!<br>");
    }
    
    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Last name must be between 2 to 25 characters!<br>");
    }
    
    if ($pass != $pass2) {
        array_push($error_array, "Password do not match!<br>");
    }
    else {
        if (preg_match('/[^A-Za-z0-9]/', $pass)) {
            array_push($error_array, "Password can only contain english characters or numbers!<br>");
        }
    }
    
    if (strlen($pass) > 30 || strlen($pass) < 5) {
        array_push($error_array, "Password must be between 5 to 30 characters!<br>");
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
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
            
            if (isset($_SESSION['reg_fname'])) {
                echo $_SESSION['reg_fname'];
            }
            
            ?>" required/>
            <br>
            <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
            
            if (isset($_SESSION['reg_lname'])) {
                echo $_SESSION['reg_lname'];
            }
            
            ?>" required/>
            <br>
            <input type="email" name="reg_email" placeholder="Email" value="<?php 
            
            if (isset($_SESSION['reg_email'])) {
                echo $_SESSION['reg_email'];
            }
            
            ?>" required/>
            <br>
            <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
            
            if (isset($_SESSION['reg_email2'])) {
                echo $_SESSION['reg_email2'];
            }
            
            ?>" required/>
            <br>
            <input type="password" name="reg_pass" placeholder="Password" required/>
            <br>
            <input type="password" name="reg_pass2" placeholder="Confirm Password" required/>
            <br>
            <input type="submit" name="reg_button" value="Submit"/>
        </form>
    </body>
</html>