<?php
$DB_server = "localhost";
$DB_password = "root";
$DB_user = "root";
$DB_name = "paginationtutorial";


$conn = mysqli_connect($DB_server,$DB_user,$DB_password,$DB_name);
//I guess we can use mysqli_select_db?
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}
?>