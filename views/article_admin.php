<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF8">
        <title>Blog</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
        </script>
    </head>
    <body>
        <div class="container">
            <h1>Blog</h1>
            <a href="../index.php">Домой</a>
            <div>
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                    <label>
                    Имя
                        <input type="text" name="title" value="<?php echo isset($article['title']) ? $article['title'] : ''; ?>" class="form-item" autofocus required>
                    </label>
                    <input type="hidden" name="likes_id" value="text">
                    <label>
                    Раздел
                        <p><select class="form-item" name="section_id">
                        <option ></option>
                        <option value="1">Раздел 1</option>
                        <option value="2">Раздел 2</option>
                       </select></p>
                    </label>
                    <label>
                    Дата
                        <input name="date" id="datepicker" value="<?php echo isset($article['date']) ? $article['date'] : ''; ?>" class="form-item" required>
                    </label>
                    <label>
                    Текст
                    <textarea class="form-item" name="content" required><?php echo isset($article['content']) ? $article['content'] : ''; ?></textarea>
                    </label>

                    <input type="submit" value="Сохранить" class="btn">
                </form>
            </div>
        </div>
    </body>
    <footer>
        Мой первый блог<br>
        copyright &copy; 2017
    </footer>
</html>