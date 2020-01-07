<?php
    require('config/db.php');
    require('config/config.php');
   //get id
   $pid = mysqli_real_escape_string($conn, $_GET['pid']);
   print_r($_GET['pid']);
   print_r($pid);
    //create query
    $query = 'SELECT * FROM page_data1 WHERE pid = ' . $pid; //why not use " and var interpolatoin?

    //get result
    $result = mysqli_query($conn, $query);

    //fetch data

    $data = mysqli_fetch_assoc($result);

    //free result
    mysqli_free_result($result);

    //close connection
    
    mysqli_close($conn);

    print_r($data);
    ?>


<?php include('inc/header.php');?>
    <a href="<?php echo ROOT_URL;?>">Go Back </a>
    <h1><?php echo $data['page_title']; ?></h1>
<?php include('inc/footer.php');?>