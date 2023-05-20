<?php
$mysql = new mysqli("localhost","root","","вариант 17");
$mysql -> query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$id = $uid = $first = $last = $otch =$stat = $raz = $chas = $nar = $otp = $bol = "Не определено";
if (isset($_POST["id"]))
 $id = $_POST["id"];
if(isset($_POST["uid"]))
 $uid = $_POST["uid"];
if(isset($_POST ["first"]))
    $first = $_POST["first"];
if(isset($_POST["last"]))
    $last = $_POST["last"];
if(isset($_POST["otch"]))
    $otch = $_POST["otch"];
if(isset($_POST["stat"]))
    $stat = $_POST["stat"];
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
$mysql -> query("INSERT INTO  работник(`Номер подразделения`, `Табельный номер`, `Имя`, `Фамилия`, `Отчество`, `Статус`, `Разряд`)
                        VALUES ($id, $uid, '$first', '$last', '$otch', '$stat', $raz)");
$mysql -> query("INSERT INTO `тарифная ставка`(`Табельный номер`,`Почасовая оплата (рубли)`,`Сдельная оплата (рубли)`,`Отпускные`,`Больничные`)
                        VALUES ($uid, $chas, $nar, $otp , $bol)" );
$mysql-> close();
?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>