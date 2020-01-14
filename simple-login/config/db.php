<?php

$DB_server = "localhost";
$DB_password = "root";
$DB_user = "root";
$DB_name = "loginsystemtutorial1";

$conn = mysqli_connect($DB_server, $DB_user, $DB_password, $DB_name);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}