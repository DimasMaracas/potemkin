<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 17.10.2016
 * Time: 15:47
 */
include_once 'Connect_to_database.php'; //Соединение с базой данных
include_once 'Insert_to_json.php';      //Заполнение json-файла

?>
<!-- Тело основоного документа html -->
<html>
<head>
    <title>NewsPaper</title>
    <meta http-equiv="CONTENT-TYPE" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="Table.css">
    <script type="text/javascript" src="FirstLoad.js"></script>
    <script type="text/javascript" src="SecondLoad.js"></script>
</head>
<body id="body">
    <div align="center" id="center">
        <p id="ptag"></p><!-- Тег для кнопки обновить, показать n новостей -->
        <div id="container""></div>
    </div>
</body>
</html>
