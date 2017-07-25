<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 18.10.2016
 * Time: 14:27
 */
include_once 'Connect_to_database.php';

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 0);


$checked_date = '1970-01-01 00:00:00'; //Дата большого взрыва

//открываем и декодируем .json-файл
$json = file_get_contents('Json_database_news.json');
$json = json_decode($json, true);

//костыльным методом выбирает из массива последнюю запись по критерию даты (по дате добавления - самая последняя)
foreach($json as $key){
    if($checked_date < $key['daterecord']){
        $checked_date = $key['daterecord'];
    }
}

//убираем лишнюю шелуху
$checked_date = str_replace(array('-',' ', ':'), '', $checked_date);


//Делаем новый запрос в БД
$new_result = mysqli_query($link, "SELECT * FROM `newline` WHERE `daterecord` > $checked_date")
or die("Ошибка запроса ".mysqli_errno($link).": ".mysqli_error($link));


if (mysqli_num_rows($new_result) > 0){

    //добавляем в .json-файл выбранные записи из БД
    while ($assoc = @mysqli_fetch_assoc($new_result)){
        $json[] = $assoc;
    }
}


//кодируем и отправляем обратно в .json-файл
$jsontext = json_encode($json, JSON_PRETTY_PRINT);
file_put_contents('Json_database_news.json', $jsontext); //FILE_APPEND - добавить запись в конец файла

//echo $after;
//echo '<p id="output">'.'До: '.$before.' | '.'После: '.$after.'</p>';
//date_default_timezone_set('Europe/Moscow');

//$day = array('воскресенье', 'понедельник', 'вторник', 'среда', 'Четверг', 'пятница', 'суббота');
//$month = array('', 'января', 'февраля', 'марта', 'апреля',
//                'мая', 'июня','июля', 'августа',
//                'сентября', 'октября', 'Ноября', 'декабря');
//$date = 'Сегодня: ';
//$date .= $day[(int)date('w')];
//$date .= date(', d ');
//$date .= $month[(int)date('n')];
//$date .= date(', Y').' года';
//$date .= '<br> Местное время: '.date(' H:i');
////$date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (формат MySQL DATETIME)
//echo $date.'<br>';
//
//$a = getdate();
//printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);

//свобождаем переменные
mysqli_free_result($new_result);
mysqli_close($link);
?>