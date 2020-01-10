<?php
    require('config/db.php');
    require('config/config.php');


    //create query
    $query = 'SELECT * FROM page_data1 ORDER BY pid DESC';

    //get result
    $result = mysqli_query($conn, $query);

    //fetch data

    $data1 = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //free result
    mysqli_free_result($result);

    //close connection
    
    mysqli_close($conn);

    print_r($data1);
    ?>


<?php include('inc/header.php');?>
<?php include('inc/navbar.php');?>
    <h1>Posts</h1>
    <?php foreach($data1 as $data):?>
     <h3><?php echo $data['page_title']; ?></h3>
     <a href="<?php echo ROOT_URL;?>data.php?pid=<?php echo $data['pid'];?>">Read More</a>
    <?php endforeach;?>
<?php include('inc/footer.php');?>







<?php /*


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

?>