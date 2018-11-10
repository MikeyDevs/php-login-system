<?php

//CHECK TO SEE IF THE "SUBMIT" BUTTON WAS HIT FOR SECURITY PURPOSES. IF NOT, THEY WILL BE REDIRECTED TO SIGN UP PAGE
if (isset($_POST['submit'])) {

    //INCLUDES OUR DATABASE CONNECTION
    include_once './database-files/login_database-connection.php';

    //SETTING VARIABLES TO GRAB THE VALUES FROM THE POST METHOD OF OUR FORM
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //OUR ERROR HANDLERS TO CHECK USER INPUT 

    //CHECK TO SEE IF INPUTS ARE EMPTY
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ./signup.php?signup=empty");
        exit();
    } else {
        //CHECK TO SEE IF THE FIRST AND LAST NAME INPUT FIELDS HAVE VALID CHARACTERS
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ./signup.php?signup=invalid");
            exit();
        } else {
            //CHECK TO SEE IF E-MAIL IS VALID
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ./signup.php?signup=email");
                exit();
            } else {
                //CHECK TO SEE IF USERNAME ALREADY EXISTS IN DATABASE 
                $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $checkresult = mysqli_num_rows($result);

                    //IF A ROW IS RETURNED, INFORM USER
                    if ($checkresult > 0) {
                        header("Location: ./signup.php?signup=usernamelreadyexists");
                        exit();
                    } else {
                        //HASHING PASSWORD 
                        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        //INSERT DATA INTO DATABASE
                        $sql = "INSERT INTO users (first_name, last_name, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashPwd' );";
                        mysqli_query($conn, $sql);
                        header("Location: ./signup.php?signup=success");
                        exit();
                }
            }
        }
    }
} else {
    header("Location: ../signup.php");
    exit();
}