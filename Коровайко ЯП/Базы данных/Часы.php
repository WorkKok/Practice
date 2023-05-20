
<?php

$mysql = new mysqli("localhost", "root", "", "вариант 17");
$mysql->query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$id = $chas = "Не определено";
if(isset($_POST["id"]))
    $id = $_POST["id"];
if(isset($_POST["chas"]))
    $chas = $_POST["chas"];
$mysql -> query("INSERT INTO `табеля` VALUES ($id, $chas) ");
echo "Данные внесены";
$mysql -> close();
?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>



