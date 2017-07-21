<html>
    <head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="regist">
            <div class="reg_box">
                <h2 class="reg" >Регистрация</h2>
                <form action="save_user.php" method="post" class="reg">
                <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
                <p>
                <label>Ваш логин:<br></label>
                <input class="reg_text" name="login" type="text" size="17" maxlength="15">
                </p>
                <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
                <p>
                <label>Ваш пароль:<br></label>
                <input class="reg_text" name="password" type="password" size="15" maxlength="15">
                </p>
                <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
                <p>
                <input class="reg_but" type="submit" name="submit" value="Зарегистрироваться">
                <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
                </p></form>
                <p>Если у вас уже есть аккаунт жми <a href="../index.php"> ВХОД</a></p>
            </div>
        </div>
    </body>
    </html>