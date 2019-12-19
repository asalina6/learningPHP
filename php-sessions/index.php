<?php

    if(isset($_POST['submit'])){
        session_start();

        $_SESSION['name'] = htmlspecialchars($_POST['name']);
        $_SESSION['email'] = htmlspecialchars($_POST['email']);

        header('Location: page2.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Sessions</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="name" placeholder="Enter Name">
        <br>
        <input type="email" name="email" placeholder="Enter Email">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>