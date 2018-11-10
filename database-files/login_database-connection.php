<?php 

//DECLARING VARIABLES THAT WILL ALLOW THE USER TO CONNECT TO THE LOCAL DATABASE 
//THE Servername, Username, and Password NEED TO BE CHANGED ACCORDING TO THE LOCAL USER SETTINGS IN ORDER FOR THE WEB APP TO WORK!
$dbServername = "";
$dbUsername = "";
$dbPassword = "";
$dbName = "client_login_db";

//INITALIZING THE MYSQL CONNECTION
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);