<?php
    require('config/db.php');
    require('config/config.php');

   //check for delete submit (DO FORM VALIDATION)
   if(isset($_POST['delete'])){
    echo 'Submitted';

    //get form data
    $delete_pid = mysqli_real_escape_string($conn, $_POST['delete_pid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "DELETE FROM page_data1 WHERE pid = {$delete_pid}";

    //die($query); //for troubleshooting
    if(mysqli_query($conn,$query)){
        header('Location: ' . ROOT_URL . '');
    }else{
        echo 'ERROR: ' . mysqli_error($conn); //combined with the die query
    }
}








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
    <hr>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name="delete_pid" value="<?php echo $data['pid'];?>">
        <input type="submit" name="delete" value="Delete">
    </form>
    <a href="<?php echo ROOT_URL;?>editPost.php?pid=<?php echo $data['pid'];?>">Edit</a>
<?php include('inc/footer.php');?>