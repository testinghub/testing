<?php


    include ("../database.php");
    $db = db_connect();



    if (isset($_POST['search'])) { $search = $_POST['search']; if ($search == '') { unset($search);}}

    $search = htmlspecialchars($search);
    $search = trim($search);



    if (empty($search) || $search == FALSE) {
        echo "Неправильно введен запрос!";
    }else{
        $result = mysqli_query($db,"SELECT * FROM articles WHERE title LIKE '%".$search."%'");
        $myrow = mysqli_fetch_array($result);



    include('../search/search_complite.php');
    }


?>