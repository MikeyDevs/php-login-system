<?php

//WHEN USER CLICKS THE LOGOUT BUTTON, THE SESSION WILL START, THEN UNSET, THEN DESTROY TO LOG OUT
if (isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ./index.php");
}