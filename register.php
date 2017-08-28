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