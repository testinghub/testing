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
                <form action="sendMail.php" method="post">
                    <label><h2>Розсылка пользователям сайта</h2></label><br>
                    <textarea class="textar" name="text"></textarea><br>
                    <input type="submit" name="button" value="Отправить"></input>

                </form>

            </div>
        </div>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>