<?php
    require('config/db.php');
    require('config/config.php');

    //check for submit (DO FORM VALIDATION)
    if(isset($_POST['submit'])){
        echo 'Submitted';

        //get form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $query = "INSERT INTO page_data1(page_name,page_title,page_description) VALUES('$name','$title','$description')";


        if(mysqli_query($conn,$query)){
            header('Location: ' . ROOT_URL . '');
        }else{
            echo 'ERROR: ' . mysqli_error($conn);
        }


    }


?>


<?php include('inc/header.php');?>
    <div>   
        <h1>Add Data</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div>
                <label>Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>
            <div>
                <label>Page Description</label>
                <textarea name="description"></textarea>
            </div>

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