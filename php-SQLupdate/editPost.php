<?php
    require('config/db.php');
    require('config/config.php');

    //check for submit (DO FORM VALIDATION)
    if(isset($_POST['submit'])){
        echo 'Submitted';

        //get form data
        $update_pid = mysqli_real_escape_string($conn, $_POST['update_pid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $query = "UPDATE page_data1 SET 
                     page_name= '{$name}',
                     page_title = '{$title}',
                     page_description = '{$description}'
                        WHERE pid = {$update_pid}";

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


?>


<?php include('inc/header.php');?>
    <div>   
        <h1>Edit Data</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $data['name'];?>">
            </div>
            <div>
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $data['title'];?>">
            </div>
            <div>
                <label>Page Description</label>
                <textarea name="description" value="<?php echo $data['description'];?>"></textarea>
            </div>
            <input type="hidden" name="update_pid" value="<?php echo $data['pid'];?>">
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </div>

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