<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 18.10.2016
 * Time: 19:05
 */
include_once 'Connect_to_database.php';
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors',0);

//Запоминаем количество записей в БД
$before = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `newline`"));
echo $before;

?>