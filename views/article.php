<?php
    setCookie('111', 'test me, please', time() + 3600, '/');
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF8">
        <meta property="fb:admins" content="{100004004053117}"/>
        <meta property="fb:app_id" content="{249253302259637}"/>
        <title>Blog</title>
        <link rel="stylesheet" href="js.src = "//connect.facebook.net/ru_RUS/sdk.js#xfbml=1&amp;version=v2.4";">
        <link rel="stylesheet" href="/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <script>

      window.fbAsyncInit = function() {
        FB.init({
          appId            : '249253302259637',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v2.10'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <body>
        <div class="container">
            <h1>Blog</h1>
            <a href="../index.php">Домой</a><br><br>
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
                    <div class="fb-comments" data-href="https://www.facebook.com/54577845<?=$article['id']?>" data-width="600" data-numposts="1"></div>
                </div>
        </div>
        <?php endif ?>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>