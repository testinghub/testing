<?php

    error_reporting(E_ALL);
    ini_set('display_error', 1);


    require_once 'database.php';
    require_once 'models/articles.php';

    require_once 'helpers/authhelp.php';


    $link = db_connect();
    $articles = articles_all($link);
    $articles2 = articles_all2($link);
    $section = section_all($link);
    $like = like_all($link);


    include("views/articles.php");






   // require_once 'models/Navigator.php';


?>