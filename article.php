<?php



   require_once 'database.php';
   require_once 'models/articles.php';


   $link = db_connect();



   if(isset(($_GET['section']))){
       	$section = section_get($link, (int)$_GET['section']);
       	include("views/sect.php");

   }



   if(isset(($_GET['id']))){
       	$article = articles_get($link, $_GET['id']);
       	$like = like_get($link, $_GET['id']);

       	include("views/article.php");

   }


    if(isset($_POST['addlikes']) && isset(($_POST['id']))){
/*
        print_r($_COOKIE['like' . $_POST['id']]);
        exit();
*/
        if(!isset($_COOKIE['like' . $_POST['id']])){
            $like1 = like_edit($link, $_POST['id']);
            setcookie('like' . $_POST['id'], time(), time() + 60);

        }

        header('Location: /article.php?id='.$_POST['id']);

    }





    if(isset($_POST['adddislikes']) && isset(($_POST['id']))){
        if(!isset($_COOKIE['dislike' . $_POST['id']])){
            $dislike1 = like_edit2($link, $_POST['id']);
            setcookie('dislike' . $_POST['id'], time(), time() + 3600);
        }

        header('Location: /article.php?id='.$_POST['id']);
    }



   //include("views/sect.php");




?>