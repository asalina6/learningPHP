


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php
    $curl = curl_init();
    $search_string = "video games";
    $search_string = str_replace(" ","+",$search_string);
    $url = "https://www.amazon.com/s?k=$search_string";

    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);//RISKY, man in the middle attacks ....don't use FALSE with private information to banks etc. google is okay.
    //have proper certificates http://php.net/manual/en/function.curl-setopt.php#110452
    //
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

    $result = curl_exec($curl);

    if($result === FALSE){
        echo "cURL Error: " . curl_error($curl);
    }

    preg_match_all("!https://m.media-amazon.com/images/I/[^\s*?._AC_UY218_ML3_.jpg!",$result,$matches);
    print_r($matches);
    $images = array_values(array_unique($matches[0]));

    for($i=0;$i<count($images);$i++){
        echo "<div style='float: left; margin:10 0 0 0;'>";
        echo "<img src='$images[$i]' alt='$images[$i]'><br />";
        echo "</div>";
    }

    curl_close($curl);
?>


</body>
</html>