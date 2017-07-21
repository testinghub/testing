<?


session_start();





unset($_SESSION['login']); // разрегистрировали переменную
session_destroy(); // разрушаем сессию
header('Location: ../index.php');
exit;
?>