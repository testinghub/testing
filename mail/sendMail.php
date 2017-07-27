<?php



include ("../database.php");
$db = db_connect();
if (isset($_POST['button'])){
    $i = 0;
    $text = $_POST['text'];
/*
    $result = mysqli_query($db, "SELECT email FROM subsribe");
    $send = mysqli_fetch_array($result);
*/
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'smtp.mailtrap.io',
      'smtp_port' => 2525,
      'smtp_user' => '507121016d9661',
      'smtp_pass' => '4be39a16193369',
      'crlf' => "\r\n",
      'newline' => "\r\n"
    );
    $query = mysqli_query($db, 'SELECT email FROM `subscribe` ');
    $myrow = mysqli_fetch_array($query);
    do{
        $i++;
        $email = $myrow["email"];
        $result = mail( $email, "texting.my-style.in", $text, " ", "lsslss@ka.1");
    }
    while($myrow = mysqli_fetch_array($query));
}



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
                <?php

            if (isset($_POST['submit'])) {

              $to      = $_POST['to'];
              $subject = $_POST['subj'];
              $message = $_POST['msg'];

              // Заголовки сообщения, в них определяется кодировка сообщения, поля From, To и т.д.
              $headers = "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=windows-1251\r\n";
              $headers .= "To: $to\r\n";
              $headers .= "From: Имя отправителя <testing.my-style.in@example.com>";

              // mail ($to, $subject, $message, $headers);

              require_once "ss.php";
              MailSmtp ($to, $subject, $message, $headers);

            }

?>

<form action="" method="post">
  <pre>
    Кому:   <input type="text" name="to">
    Тема:   <input type="text" name="subj">
    Текст:  <input type="text" name="msg">
    <input type="submit" value="Отправить!" name="submit">
  </pre>
</form>

            </div>
        </div>
    </body>
    <footer>
        Moi perviy blog<br>
        copyright &copy; 2017
    </footer>
</html>