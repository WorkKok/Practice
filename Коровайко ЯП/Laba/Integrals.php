<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

/*
Функция: (exp(3*x) + 1)/(exp(x) +1)
*/

$a = 0;
$b = 2;
$n = 48;
$h = ($b-$a)/$n;
$sum = 0;
$nu = (exp(2*$b)/2 - exp($b) + $b + 0.5) - (exp(2*$a)/2 - exp($a) + $a + 0.5);

function fx($x){
    return (exp(3*$x) + 1)/(exp($x) + 1);
}

echo "а = ".$a." "."b = ".$b." "."Количество частей разбиения: ".$n.'<br>';

for($i = $a; $i <= $n; $i++){
    $x = $a + $i * $h;
 if ($i == $a || $i == $b)
     $sum += fx($x);

 if ($i % 3 == 0)
     $sum +=  4 * fx($x);

 else
     $sum += 2 * fx($x);
}
$sum = $sum * $h/3;
echo "Приблежённое значение по формуле Симпсона равно ".$sum.'<br>';
echo "Значение по форимуле Ньютона-Лейбница равно ".$nu;
?>
</body>
</html>
