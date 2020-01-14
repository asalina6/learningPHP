
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<header>
    <nav>
        <a href="#">
            <img>
        </a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About Me</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div>
            <form action="inc/login.inc.php" method="POST">
                <input type="text" name="mailuid" placeholder="Username/E-mail..." value="<?php echo isset($_POST['mailuid']);?>">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="login-submit">Login</button>
            </form>

            <a href="signup.php">Signup</a>
            <form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="logout-submit">Logout</button>
            </form>

        </div>
    </nav>
</header>