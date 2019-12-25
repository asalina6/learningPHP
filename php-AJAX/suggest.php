<?php

//todo get from DB
$people[]="Steve";
$people[]="John";
$people[]="Kathy";
$people[]="Even";
$people[]="athony";
$people[]="Hal";
$people[]="Rhonda";
$people[]="Tom";


//get query string
$q = $_REQUEST['q'];
$suggestion = '';

//get suggestion
if($q!==''){
    $q = strtolower($q);
    $len = strlen($q);

    foreach($people as $person){
        if(stristr($q,substr($person,0,$len))){
            if($suggestion === ''){
                $suggestion = $person;
            }else{
                $suggestion .= ', $person';
            }
        }
    }


}

echo $suggestion === ''? "No Suggestion" : $suggestion;


?>
