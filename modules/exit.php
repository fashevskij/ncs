<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

setcookie("id","", 0, "/");//очистим куки (при выходе из аккаунта)
//перейдем на главную
header("location: /");
