<?php
    include_once "header.php";
?>

        <div class="container" id="signup">
            <div class="row justify-content-center">
                <form action="./signup-api.php" method="POST">
                    <div class="form-group">
                    <input type="text" class="form-control" name="first" placeholder="First Name">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="last" placeholder="Last Name">
                    </div>
                    
                    <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="uid" placeholder="Username">
                    </div>

                    <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                </form>
            </div>
            <?php
                    //DISPLAY SIGN UP ERRORS TO USER

                    //LET'S GET THE FULL URL BY USING THE SUPERGLOBAL VARIABLE
                    $Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    //NOW WE CAN CHECK TO SEE IF THE ERROR PARAMETERS MATCH THE URL, AND DISPLAY ACCORDINGLY
                    if (strpos($Url, "signup=empty") == true) {
                        echo "<p class='wrong'>Oops! Something went wrong. Please fill in all of the fields.</p>";
                    } 
                    elseif (strpos($Url, "signup=invalid") == true) {
                        echo "<p class='wrong'>Oops! Something went wrong. Please do not use numbers or special characters in the first or last name fields.</p>";
                    } 
                    elseif (strpos($Url, "signup=email") == true) {
                        echo "<p class='wrong'>Oops! Something went wrong. Please enter a valid e-mail address.</p>";
                    } 
                    elseif (strpos($Url, "signup=usernamelreadyexists") == true) {
                        echo "<p class='wrong'>Oops! Something went wrong. That username is already taken. Try a different username!</p>";
                    } 
                    elseif (strpos($Url, "signup=success") == true) {
                        echo "<p class='success'>Welcome aboard! Please log in with your new account.</p>";
                    } 
                ?>
        </div>
        
<?php
    include_once "footer.php";
?>