
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF8">
        <title>Blog</title>
        <link rel="stylesheet" href="/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1>Blog</h1>
            <?php if(!empty($article)): ?>
            <div>
                <div class="article">
                    <h3>
                        <?=$article['title']?>
                    </h3>
                    <em>Opyblikovano: <?=$article['date']?></em>
                    <p><?=$article['content']?></p>
                   <?php foreach($like as $l): ?>


<!--                     <a name="like1" href="/article.php?id=<?=$article['id']?>">Like <?=$l['likes']?></a> -->
                    <div class="poslikes">
                    <form class="formplus" action="/article.php" method="post">
                        <input type="hidden" name="id" value="<?=$article['id']?>">
                        <input type="hidden" name="addlikes" value="1">
                        <button class="plus1" type="submit" name="like1" value="1" >+</button>

                    </form>
                    <div class="likes"><?=$l['likes']?></div>
                    <form class="formminus" action="/article.php" method="post">
                        <input type="hidden" name="id" value="<?=$article['id']?>">
                        <input type="hidden" name="adddislikes" value="-1">
                        <button class="minus1" type="submit" name="dislike1" value="-1">-</button>
                    </form>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <?php endif ?>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>