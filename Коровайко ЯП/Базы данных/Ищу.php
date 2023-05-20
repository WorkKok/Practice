<?php
$mysql = new mysqli("localhost","root","","вариант 17");
$mysql -> query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$id = "Не определено";
if (isset($_POST["id"])) $id = $_POST["id"];
$result = $mysql -> query("SELECT * FROM работник WHERE `Табельный номер` = $id  ");

while ($row = $result -> fetch_assoc()) {
    echo "Номер подразделения: " . $row['Номер подразделения'] . "<br>";
    echo "Табельный номер: " . $row['Табельный номер'] . "<br>";
    echo "Имя: " . $row['Имя'] . "<br>";
    echo "Фамилия: " . $row['Фамилия'] . "<br>";
    echo "Отчество: " . $row['Отчество'] . "<br>";
    echo "Статус: " . $row['Статус'] . "<br>";
    echo "Разряд: " . $row['Разряд'] . "<br>";
}
$result = $mysql -> query("SELECT * FROM `тарифная ставка` WHERE `Табельный номер` = $id  ");
while ($row = $result -> fetch_assoc()) {
    echo "Почасовая оплата: " . $row['Почасовая оплата (рубли)'] . "<br>";
    echo "Сдельная оплата: " . $row['Сдельная оплата (рубли)'] . "<br>";
    echo "Отпускные: " . $row['Отпускные'] . "<br>";
    echo "Больничные: " . $row['Больничные'] . "<br>";
}

$result = $mysql -> query("SELECT * FROM `наряды` WHERE `Табельный номер` = $id");
while ($row = $result -> fetch_assoc()){
    echo "Задание: ".$row['Содержание работы']."<br>";
    echo "Начало работы : " . $row['Начало'] . "<br>";
    echo "Конец работы : " . $row['Конец'] . "<br>";
}

$result = $mysql -> query("SELECT * FROM `табеля` WHERE `Табельный номер` = $id");
while ($row = $result -> fetch_assoc()){
    echo "Часов посещения : ". $row['Часы посещения'];
}
$mysql-> close();
?>
<br>
<p>Программа выполена успешно</p>
<a href="Выбирай.html">Выйти</a>
