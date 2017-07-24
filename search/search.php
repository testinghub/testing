<?php

    include '../database.php';
    $db = db_connect();

    $name = $_GET['name'];
    $q = mysqli_query($db, "SELECT `title` FROM `articles` WHERE `title` LIKE '%".$title."%' ORDER BY RAND()");

    $search_slovo = $_GET['q'];
    if(isset($search_slovo)){
    if(empty($search_slovo)) {exit ("Вы не ввели данные");}}

    echo " Вы искали: $search_slovo";

    if ((isset($search_slovo))) {
    $search_name= mysqli_query($db, "SELECT `name` FROM `users` WHERE `name` LIKE '%$search_slovo%' ");
    if (mysql_num_rows($search_name) != 0) {
    while ($row = mysql_fetch_assoc($search_name)) {
    echo "


    Результаты поиска: $row[name]
    ";
    }
    } else {
    echo " Ничего не найдено";
    }
    } else {
    echo "Введен пустой запрос";
    }

?>