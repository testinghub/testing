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
       	include("views/article.php");

   }



   //include("views/sect.php");




?>