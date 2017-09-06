<?php

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
    
    if (empty($error_array)) {
        
        $pass = md5($pass);
        
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        
        $i=0;
        
        while(mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }
        
        $rand = rand(1,2);
        
        if ($rand = 1) {
            $profile_pic = "assets/images/profile_pics/defaults/pro_pic1.jpg";
        }
        elseif ($rand = 2) {
            $profile_pic = "assets/images/profile_pics/defaults/pro_pic2.jpg";
        }
        
        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$email', '$pass', '$date', '$profile_pic', '0', '0', 'no', ',')");
        
        array_push($error_array, "<br><br><span style='color:#14c800;'>You are all set! go ahead and login!</span><br>");
        
        $_SESSION['reg_fname']  = "";
        $_SESSION['reg_lname']  = "";
        $_SESSION['reg_email']  = "";
        $_SESSION['reg_email2'] = "";
    }
}

?>