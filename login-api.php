<?php 

//STARTS THE SESSION
session_start();


//CHECK TO SEE IF THE "SUBMIT" BUTTON WAS HIT FOR SECURITY PURPOSES. IF NOT, THEY WILL BE REDIRECTED TO SIGN UP PAGE
if (isset($_POST['submit'])) {

     //INCLUDES OUR DATABASE CONNECTION
    include_once './database-files/login_database-connection.php';

        //SETTING VARIABLES TO GRAB THE VALUES FROM THE POST METHOD OF OUR FORM
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

            //CHECK TO SEE IF INPUTS ARE EMPTY
            if (empty($uid) || empty($pwd)) {
                header("Location: ./index.php?login=empty");
                exit();
            } else {
                //QUERY FROM DB AND CHECK TO SEE IF A ROW IS RETURNED WITH CURRENT USERNAME
                $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
                $result = mysqli_query($conn, $sql);
                $checkResult = mysqli_num_rows($result);

                //IF ROW RETURNED IS LESS THAN 1 (MEANING USERNAME NOT FOUND) THE ERROR IS HANDLED
                if ($checkResult < 1) {
                    header("Location: ./index.php?login=error");
                    exit();
                } else {
                    //CHECK TO SEE IF PASSWORD MATCHES
                    if ($row = mysqli_fetch_assoc($result)) {
                        //FIRST WE NEED TO UNHASH THE PASSWORD AND COMPARE WITH DB PASSWORD
                        $hashPwd = password_verify($pwd, $row['user_pwd']);
                            if ($hashPwd == false) {
                                header("Location: ./index.php?login=error");
                                exit();
                            } elseif ($hashPwd == true) {
                                //LOGIN SUCCESS!
                                $_SESSION['u_id'] = $row['id'];
                                $_SESSION['u_first'] = $row['first_name'];
                                $_SESSION['u_last'] = $row['last_name'];
                                $_SESSION['u_email'] = $row['user_email'];
                                $_SESSION['u_uid'] = $row['user_uid'];

                                //SUCCESS REDIRECT
                                header("Location: ./index.php?login=success");
                                exit();
                            }
                    }
                }
            }

//IF ALL ELSE FAILS, THROW AN ERROR
} else {
    header("Location: ./index.php?login=error");
    exit();
}