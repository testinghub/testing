<?php
    error_reporting(E_ALL);
    ini_set('display_error', 1);

    include('../database.php');
    $db = db_connect();



    $query = mysqli_query($db, "SELECT id, likes FROM articles JOIN likes WHERE id = likes_id LIMIT 1");
    $like = mysqli_fetch_all($query);

    echo '<pre>';
    print_r($like);
    exit;

?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF8">
        <title>Blog</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style>

    a:hover{
        text-decoration: none;
        color: #d000ff;
    }
    footer{
        text-align: center;
    }
    </style>
    <body>
        <div class="container">
            <h1>Blog</h1>

            <div>
                <a href="../index.php">Домой</a><br>

                    <?php foreach($like as $l):?>

                    <?php echo $l['likes'];?>


                    <?php endforeach?>


            </div>
        </div>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>