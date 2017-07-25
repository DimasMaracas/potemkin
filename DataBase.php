<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 01.06.2016
 * Time: 19:32
 */
ini_set('display_errors',0);
$host = "localhost";
$port = "";
$user = "Dm";       //логин
$pass = "555";      //пароль
$db = "newpaper";   //имя базы данных

$link = @mysqli_connect($host, $user, $pass, $db) or
die("Не могу подключиться к БД ".mysqli_connect_errno().":".mysqli_connect_error());

@mysqli_query($link,"SET CHARACTER SET 'utf8'");

$query = "SELECT * FROM `newline` ";

$result = mysqli_query($link, $query) or die("Ошибка запроса ".mysqli_errno($link).":".mysqli_error($link));

?>
    <?php
    while($row = @mysqli_fetch_assoc($result)){
        //echo json_encode($row['id_news']);
        echo json_encode($row[text_news]);
        echo "<br />";
    }
    ?>