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
                <a href="../index.php">Домой</a><br><br>
                <a href="index.php?action=add">Добавить</a>

                <table class="admin-table">
                    <tr>
                        <th>Дата</th>
                        <th>Заголовок</th>
                        <th></th>
                        <th></th>
                    </tr>
                <?php foreach($articles as $a): ?>
                    <tr class="teeext">
                        <td><?=$a['date']?></td>
                        <td><?=$a['title']?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </table>


            </div>
        </div>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>