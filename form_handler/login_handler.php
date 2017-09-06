<?php

if (isset($_POST['log_button'])) {
    
    // Email
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // sanitize email
    $_SESSION['log_email'] = $email; // storing value to session
    
    // Pass
    $pass = md5($_POST['log_pass']); // get password
        
        $database_check_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$pass' ");
        
        $check_num_row = mysqli_num_rows($database_check_query);
        
        if ($check_num_row == 1) {
            $row = mysqli_fetch_array($database_check_query);
            $username = $row['username'];
            
            $_SESSION['username'] = $username;
            header("Location : index.php");
            exit();
        }

    }

?>