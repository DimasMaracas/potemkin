<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 18.10.2016
 * Time: 14:31
 */

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 0);


//выбираем 10 последних записей из БД
$query = "SELECT `id_news`, `daterecord`, `text_news` FROM `newline` ORDER BY `id_news` DESC LIMIT 3";
$result = mysqli_query($link, $query) or die("Ошибка запроса ".mysqli_errno($link).": ".mysqli_error($link));


while ($row = @mysqli_fetch_assoc($result)) {

    $json[] = $row;

    //$json[]->{"id"} = $row['id_news'];          //код записи
    //$json[]->{"title"} = $row['text_news'];     //текст записи (новость)

}
$json = array_reverse($json);

$jsontext = json_encode($json, JSON_PRETTY_PRINT);            //кодируем данные в формат .json
file_put_contents('Json_database_news.json', $jsontext);      //отправляем данные в сам файл .json
mysqli_free_result($result);                                  //Освобождаем переменную
mysqli_close($link);                                          //закрываем соединение с БД

?>