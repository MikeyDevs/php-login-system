<?php

//INCLUDES OUR CLIENT INFO DATABASE CONNECTION
include_once './database-files/client_database-connection.php';

//INITIALIZE VARIABLES TO GRAB DATA FROM POST REQUEST FROM NEW CLIENT FORM
$clientName = $_POST["client_name"];
$clientID = $_POST["client_uid"];

//SETUP SQL QUERY TO SEND TO OUR DB
$sqlQuery = "INSERT INTO clients (client_name, client_uid) VALUES ('$clientName', '$clientID');";
mysqli_query($conn, $sqlQuery);

//REDIRECTS WITH SUCCESS URL
header("Location: ./index.php?insert=success");