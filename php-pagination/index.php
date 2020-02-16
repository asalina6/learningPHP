<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Practice</title>
</head>
<body>


<?php
    require "config/db.php";

    //define how many results per page
    $results_per_page = 10;

    //find number of results
    $sql = 'SELECT * FROM alphabet';
    $result = mysqli_query($conn, $sql);
    $number_of_results = mysqli_num_rows($result); 

    //please usee prepared statements only if user provides the variables. if not we're safe.

    //determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    //determine what page number visitor is on
    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page=$_GET['page'];
    }

    //determine sql limit starting number for the results on the displaying page.
    $this_page_first_result = ($page-1)*$results_per_page;

    //retrieve selected results from database and display
    $sql = 'SELECT * FROM alphabet LIMIT ' . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        echo $row['ID'] . ' ' . $row['Alphabet'] . '<br>';
    }
    //display links to the pages
    for($page=1;$page<=$number_of_pages;$page++){
        echo '<a href="index.php?page='. $page . '">' . $page . '</a>';
    }
?>
    
</body>
</html>