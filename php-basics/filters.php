<?php
//check for posted data

/*var_dump(filter_has_var(INPUT_POST,'data'));

    if(filter_has_var(INPUT_POST, 'data')){
        echo 'Data Found and this is the data: '.htmlentities($_POST['data']) . '<br>';
    }else{
        echo 'No Data';
    }

    if(filter_has_var(INPUT_POST,'data')){

        $email = $_POST['data'];
        //remove illegal characters
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);

        echo $email . '<br>';

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Email is Valid';
        }else{
            echo 'Email is NOT valid';
        }
    }*/
/*
    $var = 23;

    if(filter_var($var,FILTER_VALIDATE_INT)){
        echo $var. ' is a number';
    }else{
        echo $var. ' is NOT a number';
    }*/

    $filters = array(
        "data" => FILTER_VALIDATE_EMAIL,
        "data2" => array(
                "filter" => FILTER_VALIDATE_INT,
                "options"=> array(
                    "min_range"=> 1,
                    "max_range"=>100
                )
            )
                );

    print_r(filter_input_array(INPUT_POST,$filters));



?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name = "data">
    <input type="number" name = "data2">
    <button type = "submit">Submit</button>
</form>
