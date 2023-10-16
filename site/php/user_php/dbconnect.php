<?php
    // Указываем кодировку
    header('Content-Type: text/html; charset=utf-8');
 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "test";
    // Подключение к базе данных через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);
 
    // Проверяем, успешность соединения. 
    if ($mysqli->connect_errno) { 
        echo "pzdc";
        die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$mysqli->connect_error."</p>"); 
    }
    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');
    echo 123;
    //Для удобства, добавим здесь переменную, которая будет содержать адрес (URL) нашего сайта
    $address_site = "localhost";
    echo 2131;
?>