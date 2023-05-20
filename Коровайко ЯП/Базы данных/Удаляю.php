<?php
$mysql = new mysqli("localhost","root","","вариант 17");
$mysql -> query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$id = null;
if(isset($_POST["id"])){
    $id = $_POST["id"];
}
$mysql -> query("DELETE FROM `работник` 
                        WHERE `Табельный номер` = '$id' ");
$mysql-> close();
?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>
