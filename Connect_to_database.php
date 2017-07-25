<?php
///**
// * Created by PhpStorm.
// * User: Дмитрий
// * Date: 01.06.2016
// * Time: 15:12
// */
/*
 * ИмяБД: newpaper
 * ИмяТаблицы: newline
 *  Поля: id_news, text_news
 */


/* Подключение к базе данных
---------------------------------------------------*/
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 0);

$host   = "localhost";
$port   = "";
$user   = "Dm";         //логин
$pass   = "555";        //пароль
$db     = "newpaper";   //имя базы данных

$link = @mysqli_connect($host, $user, $pass, $db)
or die("Не могу подключиться к БД ".mysqli_connect_errno().": ".mysqli_connect_error());

@mysqli_query($link, "SET CHARACTER SET 'utf8'");

//Запомнить количество записей в БД
//$before = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `newline`"));

?>
