<?php

$mysql = new mysqli("localhost", "root", "", "вариант 17");
$mysql->query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

    $id = $rab = $date_1 = $date_2 = "Не определено";
    if (isset($_POST["id"]))
        $id = $_POST["id"];
    if(isset($_POST["rab"]))
        $rab = $_POST["rab"];
    if(isset($_POST ["date_1"]))
        $date_1 = $_POST["date_1"];
    if(isset($_POST["date_2"]))
        $date_2 = $_POST["date_2"];
$mysql -> query("INSERT INTO `наряды` VALUES ($id, '$rab', '$date_1', '$date_2') ");
    $mysql -> close();

?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>