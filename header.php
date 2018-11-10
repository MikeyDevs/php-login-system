<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- IMPORT GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
    <title>Monkedia Client Database</title>
</head>

<body>
    <header>
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- LOGIC FOR SHOWING OR HIDING THE HOME LINK DEPENDING ON USER AUTH -->
                <?php
                    if(isset($_SESSION['u_uid'])) {
                        echo '';
                    } else {
                        echo '<a class="nav-link" href="index.php">Home</a>';
                    }
                ?>
                <!-- LOGIC FOR SHOWING EITHER LOGIN OR LOGOUT DEPENDING ON USER AUTH -->
                        <?php
                            if(isset($_SESSION['u_uid'])) {
                                echo '<form class="form-inline my-2 my-lg-0" action="logout-api.php" method="POST">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Logout</button>
                                    </form>';
                            } else {
                                echo '<form class="form-inline my-2 my-lg-0" action="login-api.php" method="POST">
                                <input class="navbar-brand" type="text" name="uid" placeholder="Username/E-mail">
                                <input class="navbar-brand" type="password" name="pwd" placeholder="Password">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Login</button>
                                </form>
                                <a class="nav-link" href="signup.php">Sign Up!</a>';
                            }
                        ?>
            </nav>
        </div>
        <?php
                        //DISPLAY LOGIN ERRORS TO USER

                        //LET'S GET THE FULL URL BY USING THE SUPERGLOBAL VARIABLE
                        $Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        //NOW WE CAN CHECK TO SEE IF THE ERROR PARAMETERS MATCH THE URL, AND DISPLAY ACCORDINGLY
                        if (strpos($Url, "login=empty") == true) {
                            echo "<p class='wrong'>Please fill in both username/e-mail and password.</p>";
                        } 
                        elseif (strpos($Url, "login=error") == true) {
                            echo "<p class='wrong'>Oops! Something went wrong. Please try again.</p>";
                        } 
        ?>
    </div>
    </header>