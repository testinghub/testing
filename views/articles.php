<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();

    ?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF8">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/style.css?<?php echo time(); ?>">
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
                    <?php if(isADM()){ ?><a href="mail/sendMail.php">Розсылка</a><br><?php } ?>
                    <div>
                        <?php
                            require_once 'models/Navigator.php';
                            "<div class='cont'>";
                            foreach($postrow as $article):
                            foreach($article as $a):
                                ?>
                                <div class="article">
                                    <h3>
                                        <a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a>
                                    </h3>
                                    <em>Публикация: <?=$a['date']?></em>
                                    <p class="text"><?=articles_intro($a['content'])?>...</p>
                                </div>
                                  <?php
                            endforeach;
                            endforeach;
                            "</div>";
                            $pervpage = $page !=1 ? '<a href= ../index.php?page=1><<</a><a href= ./index.php?page='. ($page - 1) .'><</a> ' : ' ';
                            $nextpage = $page != $total ? ' <a href= ../index.php?page='. ($page + 1) .'>></a><a href= ./index.php?page=' .$total. '>>></a>' : '';
                            $page2left = $page - 2 > 0 ? ' <a href= ../index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ' : '';
                            $page1left = $page - 1 > 0 ? '<a href= ../index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ' : '' ;
                            $page2right = $page + 2 <= $total ? ' | <a href= ../index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>' : '' ;
                            $page1right = $page + 1 <= $total ? ' | <a href= ../index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>' : '' ;
                            // Вывод меню
                            echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;
                        ?>
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
                    <div class="signup" >
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
                        <?php
                        $client_id = '982231778523-t6eha4lnvu50k3voi2q59mfeee301dui.apps.googleusercontent.com'; // Client ID
                        $client_secret = 'thuI1fgXL4wO_aRWpv42S6sq'; // Client secret
                        $redirect_uri = 'http://localhost:8888'; // Redirect URIs
                        $url = 'https://accounts.google.com/o/oauth2/auth';

                        $params = array(
                            'redirect_uri'  => $redirect_uri,
                            'response_type' => 'code',
                            'client_id'     => $client_id,
                            'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
                        );

                        echo $link = '<p><a class="gAuth" href="' . $url . '?' . urldecode(http_build_query($params)) . '">Google+</a></p>';

                        if (isset($_GET['code'])) {
                            $result = false;

                        $params = array(
                            'client_id'     => $client_id,
                            'client_secret' => $client_secret,
                            'redirect_uri'  => $redirect_uri,
                            'grant_type'    => 'authorization_code',
                            'code'          => $_GET['code']
                        );

                        $url = 'https://accounts.google.com/o/oauth2/token';

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_POST, 1);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                        $result = curl_exec($curl);
                        curl_close($curl);
                        $tokenInfo = json_decode($result, true);

                        if (isset($tokenInfo['access_token'])) {
                            $params['access_token'] = $tokenInfo['access_token'];

                        $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
                        if (isset($userInfo['id'])) {
                            $userInfo = $userInfo;
                            $result = true;
                            $_SESSION['name']=$userInfo;
                            }
                        }


                        }




                        ?>
                        <?php


                        // Проверяем, пусты ли переменные логина и id пользователя
                        if (empty($_SESSION['name']['id']) && (empty($_SESSION ['login'])&&empty($_SESSION['id'])))
                        {
                        // Если пусты, то мы не выводим ссылку
                        echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка доступна только зарегистрированным пользователям</a>";
                        }else{
                        // Если не пусты, то мы выводим ссылку
                            echo "Вы успешно вошли на сайт<br><a  href='../index.php'>На главную</a>";
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