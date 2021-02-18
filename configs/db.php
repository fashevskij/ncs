<?php
//данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "poli";
//подключение к базе данных чата
$connect = mysqli_connect($server, $username, $password, $dbname);
//кодировка базы данных
mysqli_query($connect,"utf8");
?>
