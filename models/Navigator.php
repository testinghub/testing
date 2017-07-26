<?php
// Устанавливаем соединение с базой данных
$db = db_connect();
// Переменная хранит число сообщений выводимых на станице
$num = 3;
// Извлекаем из URL текущую страницу
$page = 1;
//$page = $_GET['page'];
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
// Определяем общее число сообщений в базе данных
$result = mysqli_query($db,"SELECT COUNT(*) as count FROM articles");
$posts = mysqli_fetch_row($result);
$posts = !empty($posts) ? array_pop($posts) : 0;
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
//$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
$result = mysqli_query($db,"SELECT * FROM articles ORDER BY id DESC LIMIT $start, $num ");
// В цикле переносим результаты запроса в массив $postrow
 $postrow[] = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>