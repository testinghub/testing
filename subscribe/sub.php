<?php
    include ("../database.php");
    $db = db_connect();

    if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }

    $email = htmlspecialchars($email);
    $email = trim($email);

/*
    echo '<pre>';
    print_r($email);
    exit;
*/

    $result = mysqli_query($db,"INSERT INTO subscribe (email) VALUES('$email')");
    //$myrow = mysqli_fetch_array($result);



    if ($result == 'TRUE')
    {
    echo "Вы успешно подписались на новости! Теперь вы можете зайти на сайт. <a href='../index.php'>Главная страница</a>";
    }
 else {
    echo "Проверьте данные.";
    }











?>