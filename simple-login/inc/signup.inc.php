<?php

if(isset($_POST['signup-submit'])){

    require "../config/db.php";

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
       header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&email=" . $email); 
       exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=" . $username);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invaliduid&email=" . $email);
        exit();
    }else if( $pwd !== $pwdRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=" . $username . "&email=" . $email);
        exit();
    }
    else{
       $query = 'SELECT uidUsers FROM users WHERE uidUsers=?'; 
       $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement,$query)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            
            mysqli_stmt_bind_param($statement, "s",$username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement); //use only if you were doing a select statement

            $resultCheck = mysqli_stmt_num_rows($statement);
           
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=" . $mail);
                exit();
            }else{
                $query = 'INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)';
                $statement = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($statement,$query)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($statement,"sss",$username,$email,$hashedPwd);
                    mysqli_stmt_execute($statement);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }   
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}else{
    header("Location: ../signup.php");
    exit();
}