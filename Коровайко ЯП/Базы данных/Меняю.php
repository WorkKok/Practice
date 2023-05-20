<?php
$mysql = new mysqli("localhost","root","","вариант 17");
$mysql -> query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$id = $rab = $nach = $end = $stat = $raz = $chas = $nar = $otp = $bol = $pos = null;
if (isset($_POST["id"]))
    $id = $_POST["id"];
if(isset($_POST["rab"]))
    $rab = $_POST["rab"];
if(isset($_POST ["nach"]))
    $nach = $_POST["nach"];
if(isset($_POST["end"]))
    $end = $_POST["end"];
if(isset($_POST["stat"]))
    $stat = $_POST["stat"];
if(isset($_POST["pos"]))
    $pos = $_POST["pos"];
if(isset($_POST["raz"]))
    $raz = $_POST["raz"];
if(isset($_POST["chas"]))
    $chas = $_POST["chas"];
if(isset($_POST["nar"]))
    $nar = $_POST["nar"];
if(isset($_POST["otp"]))
    $otp = $_POST["otp"];
if(isset($_POST["bol"]))
    $bol = $_POST["bol"];

if($id = null){
    exit();
}

if ($stat != null & $raz != null){
$mysql -> query("UPDATE  `работник` SET
                         `Статус` = '$stat',
                         `Разряд` = '$raz'
                        WHERE `Табельный номер` = '$id' ");
}
if ($rab != null & $nach != null & $end != null){
    $mysql -> query("UPDATE  `наряды` SET
                         `Содержание работы` = '$rab',
                         `Начало` = '$nach',
                         `Конец` = '$end'
                        WHERE `Табельный номер` = '$id' ");
}
if ($nar != null & $chas != null & $otp != null & $bol != null){
    $mysql -> query("UPDATE  `тарифная ставка` SET
                         `Почасовая оплата (рубли)` = '$chas',
                         `Сдельная оплата (рубли)` = '$nar',
                         `Отпускные` = '$otp',
                         `Больничные` = '$bol'
                        WHERE `Табельный номер` = '$id' ");
}
if($pos != null) {
    $mysql -> query("UPDATE  `табеля` SET
                         `Часы посещения` = '$pos'
                        WHERE `Табельный номер` = '$id' ");
}
$mysql-> close();
?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>