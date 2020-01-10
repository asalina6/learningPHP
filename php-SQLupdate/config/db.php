<?php

require('config/config.php');


/*PROCEDURAL PROGRAMMIGN*/

$conn = mysqli_connect($db_host, $db_user,$db_pass,$db_name);

if(mysqli_connect_errno()){
    echo 'Failed to Connect to mysql ' . mysqli_connect_errno();
}else{
    echo 'Connected Procedural Programming.';
}
?>