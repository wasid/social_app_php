<?php

require "config/config.php";
require "includes/form_handler/register_handler.php";
require "includes/form_handler/login_handler.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome To Fb Clone!</title>
        <link rel="stylesheet" href="assets/css/register_style.css" type="text/css" />
    </head>
    <body>
        <div class="wrapper">
            <div class="login_box">    
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email" value="<?php 
                    
                    if (isset($_SESSION['log_email'])) {
                        echo $_SESSION['log_email'];
                    }
                    
                    ?>" required/>
                    <br>
                    <input type="password" name="log_pass" placeholder="Password" required/>
                    <br>
                    <input type="submit" name="log_button" value="Login"/>
                    <?php
                        if (in_array( "<br><span style='color:red;'>Email or Password was incorrect!</span><br>", $error_array)) {
                            echo "<br><span style='color:red;'>Email or Password was incorrect!</span><br>";
                        }
                    ?>
                    
                </form>
                
                <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
                    
                    if (isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    }
                    
                    ?>" required/>
                    <br>
                    
                    <?php
                    
                        if (in_array("First name must be between 2 to 25 characters!<br>", $error_array)) {
                            echo "First name must be between 2 to 25 characters!<br>";
                        }
                    
                    ?>
                    
                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
                    
                    if (isset($_SESSION['reg_lname'])) {
                        echo $_SESSION['reg_lname'];
                    }
                    
                    ?>" required/>
                    <br>
                    
                    <?php
                    
                        if (in_array("Last name must be between 2 to 25 characters!<br>", $error_array)) {
                            echo "Last name must be between 2 to 25 characters!<br>";
                        }
                    
                    ?>
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
                    
                    <?php
                        if (in_array("$email email is already taken!<br>", $error_array)) {
                            echo "$email email is already taken!<br>";
                        }
                        elseif (in_array("$email is not a valid email address!<br>", $error_array)) {
                            echo "$email is not a valid email address!<br>";
                        }
                        elseif (in_array("Emails do not match!<br>", $error_array)) {
                            echo "Emails do not match!<br>";
                        }
                    ?>
                    
                    <input type="password" name="reg_pass" placeholder="Password" required/>
                    <br>
                    <input type="password" name="reg_pass2" placeholder="Confirm Password" required/>
                    <br>
                    
                    <?php
                        if (in_array("Password do not match!<br>", $error_array)) {
                            echo "Password do not match!<br>";
                        }
                        elseif (in_array("Password can only contain english characters or numbers!<br>", $error_array)) {
                            echo "Password can only contain english characters or numbers!<br>";
                        }
                        elseif (in_array("Password must be between 5 to 30 characters!<br>", $error_array)) {
                            echo "Password must be between 5 to 30 characters!<br>";
                        }
                    ?>
                    
                    <input type="submit" name="reg_button" value="Register"/>
                    
                    <?php
                        if (in_array( "<br><br><span style='color:#14c800;'>You are all set! go ahead and login!</span><br>", $error_array)) {
                            echo  "<br><br><span style='color:#14c800;'>You are all set! go ahead and login!</span><br>";
                        }
                    ?>
        
                </form>
            </div>
        </div>
    </body>
</html>