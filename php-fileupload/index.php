<?php

function upload_file(){

    $tmp_name = $_FILES['file']['tmp_name'];
    $target_dir = 'uploads/';

    $current_dir = getcwd();
    $current_dir = str_replace("\\","/",$current_dir);

    if( ! ( file_exists($current_dir . "/" .  $target_dir) )){
        echo "file created";
        mkdir($current_dir . "/" .  $target_dir,0777,false);
    }

    $target_file = $target_dir . basename($_FILES['file']['name']);
    $max_file_size = 5000000;
    $allowed_file_types = array('application/pdf; charset-binary');
    $allowed_image_types = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);


    $image_check = getimagesize($tmp_name);

    //check if image type is allowed
    if( ! in_array($image_check[2],$allowed_image_types)){
        //if not allowed in image types, check if allowed file types
        exec( 'file -bi' . $tmp_name, $file_check);

        if(! in_array($file_cehck[0],$allowed_file_types)){
            return 'This file is not allowed.';
          }

    }

    //check if file exists
    if(file_exists($target_file)){
        return 'Sorry, that file already exists.';
    }

    //check file size
    if(filesize($tmp_name) > $max_file_size){
        return 'Sorry, this file is too big.';
    }
    //other things we can do
    //virus checking, gdlibrary to remake the image


    //store the file (final step)
    if(move_uploaded_file($tmp_name, $target_file)){
        chmod($target_file,0644); //prevents execution; not executuable
        return 'Your file was uploaded.';
    }else{
        return 'There was a problem uploading your file';
    }
}

if(!empty($_FILES)){
    echo upload_file();
}

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
    <form method="post" action = "" enctype="multipart/form-data">
    Select image to upload:

    <input type="file" name="file">
    <input type="submit" value="Upload">

    </form>
</body>
</html>