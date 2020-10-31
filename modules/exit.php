<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
//очистим куки (при выходе из аккаунта)
setcookie("id","", 0, "/");
//перейдем на главную
header("location: /");