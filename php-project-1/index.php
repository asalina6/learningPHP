<?php

    //check for submit
    if(filter_has_var(INPUT_POST, 'submit')){

        $msg='';
        $msgClass='';

        echo 'Submitted';
        //get the form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(!empty($email) && !empty($name) && !empty($message)){
            //success
            //check email
            if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
                //failed
                $msg="Please use a valid email";
                $msgClass="alert-danger";
            }else{
                //success
                //receipeient Email
                $toEmail = 'chibisenpai94@gmail.com';
                $subject = 'Contact Request From '.$name;
                $body = '<h2>Contact Request</h2>
                        <h4>Name</h4><p>'.$name.'</p>';
                //Email headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                //additional headers
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                if(mail($toEmail,$subject,$body,$headers)){
                    $msg = 'Your email has been sent.';
                    $msgClass = 'alert-sucess';
                }else{
                    $msg="Your email has NOT been sent.";
                    $msgClass="alert-danger";
                }


            }
        }else{
            //fail
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">My Website</a>
            </div>
        </div>
    </nav>

    <div class="container">
    <?php if($msg != ''):?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg?></div>
    <?php endif;?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class= "form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" id="email">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" id="message" value="<?php isset($_POST['message']) ? $message : ''; ?>"></textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>