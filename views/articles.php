<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
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
        color: #03b453;
    }
    .text{
        width: 500px;
    }
    footer{
        text-align: center;
    }

    </style>
    <body>
        <div class="container">
            <div class="grid">
                <div class="column left">
                    <h1>Blog</h1>
                    <?php if(isADM()){ ?><a href="admin">Панель админа</a><br><?php } ?>
                    <?php if(isADM()){ ?><a href="mail/mail.php">Розсылка</a><br><?php } ?>
                    <div class="cont">
                        <?php foreach($articles as $a): ?>
                            <div class="article">
                                <h3>
                                    <a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a>
                                </h3>
                                <em>Публикация: <?=$a['date']?></em>

                                <p class="text"><?=articles_intro($a['content'])?>...</p>
                            </div>

                        <?php endforeach ?>
                    </div>
                </div>
                <div class="column right">



                    <div class="searching">
                        <form action="../search/search.php" method="post">
                            <input class="search" type="text" name="search" autofocus >
                            <input class="search_but" type="submit" name="submit" value="Поиск">
                        </form>
                    </div>

                    <div class="lastnews">
                        <?php foreach($articles2 as $a2): ?>
                            <div>
                                <a href="article.php?id=<?=$a2['id']?>"><?=$a2['title']?></a><br>
                                <em>Публикация: <?=$a2['date']?></em>
                            </div>


                            <div>
                                <p class=""><?=articles_intro2($a2['content'])?>...</p>

                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="section">
                        <p class="name">Разделы</p>
                        <?php foreach($section as $s): ?>
                            <div>
                                <a href="article.php?section=<?php echo $s['id']?>"><?php echo $s['name']?></a>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="sub">
                        <form class="sub_form" method="post" action="/subscribe/sub.php">
                        <label>Подписка на наши новости</label><br>
                        <label>Ваш e-mail:</label><br>
                        <input class="sub_text" name="email" type="email" size="25" maxlength="50">
                        </p>
                        <p>
                        <input class="sub_but" type="submit" name="submit" value="Подписаться">
                        </form>
                    </div>
                    <div class="signup">
                        <form action="/registration/testreg.php" method="post">


                        <p>
                        <label>Ваш логин:<br></label>
                        <input class="sub_text" name="login" type="text" size="15" maxlength="15">
                        </p>


                        <p>

                        <label>Ваш пароль:<br></label>
                        <input class="sub_text" name="password" type="password" size="15" maxlength="15">
                        </p>


                        <p>
                        <input class="but" type="submit" name="submit" value="Войти">


                        <br>

                        <a href="/registration/reg.php">Зарегистрироваться</a>
                        </p></form>
                        <br>
                        <?php
                        // Проверяем, пусты ли переменные логина и id пользователя
                        if (empty($_SESSION['login']) or empty($_SESSION['id']))
                        {
                        // Если пусты, то мы не выводим ссылку
                        echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
                        }
                        else
                        {

                        // Если не пусты, то мы выводим ссылку
                        echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='../index.php'>На главную</a>";
                        }
                        ?><br>
                        <?php if(isAuth()){ ?><a href="/registration/exit.php">Выход</a><?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <footer>
        Мой первый блог<br>
        copyright &copy; 2017
    </footer>
</html>