<?php
$db_user = 'root';
$db_pass = 'root';
$db_name = 'test_db1';
$db_host = 'localhost';
//I know not to publish credentials if it were a real database.

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

if($mysqli -> connect_errno){
    printf("Connect failed: $s\n",$mysqli->connect_error);
    exit();
}else{
    echo 'Connected MySQLi';
}

/*PDO
try{
    $conn = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $conn -> setATtribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo 'Connected PDO';
} catch(PDOException $e){
    echo 'ERROR' . $e->getMessage();
}*/