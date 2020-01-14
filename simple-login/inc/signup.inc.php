<?php

if(isset($_POST['signup-submit'])){

    require "./config/db.php";

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
       header("Location: ../signup.php?error=emptyfields&uid=" . $uid . "mail=" $mail); 
       exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=" . $username);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invaliduid&mail=" . $mail);
        exit();
    }else if( $password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheckuid=" . $username . "&mail=" .$email);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; 
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=dberror");
            exit();
        }
        else{
            mysql_stmt_bind_param($statement, "s",$uid);
            mysql_stmt_execute($statement);

            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmnt);

            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=" . $mail);
                exit();
            }else{
                
            }
        }
    }




}