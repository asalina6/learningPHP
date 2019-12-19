<?php
if(isset($_GET['name'])){
    $name=htmlentities($_GET['name']);
    echo $name;
}

if(isset($_POST['name'])){
    $name=htmlentities($_POST['name']);
    echo $name;
}

if(isset($_REQUEST['name'])){
    $name=htmlentities($_POST['name']);
    echo $name;
}

$text = 'Hello World';
$output = str_replace('jobs','steve',$text);
echo $output;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="get_post.php">
        <div>
            <label>Name</label><br/>
            <input type="text" name="name">
        </div>
        <div>
        <label>Email</label><br/>
            <input type="email" name="email">
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>