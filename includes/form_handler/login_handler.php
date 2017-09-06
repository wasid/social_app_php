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
            
            $user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email ='$email' AND user_closed = 'yes'");
            $check_closed_user = mysqli_num_rows($user_closed_query);
            if ($check_closed_user == 1) {
                $reopen_user = mysqli_query($con, "UPDATE users SET user_closed = 'no' WHERE email ='$email'");
            }
            
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
        else{
            array_push($error_array, "<br><span style='color:red;'>Email or Password was incorrect!</span><br>");
        }

    }

?>