<?php
    include('../database.php');
    $db = db_connect();

    $result = mysqli_query($db, "SELECT id, dislikes from articles join likes where id = likes_id");
    $dislike = mysqli_fetch_all($result);


?>
