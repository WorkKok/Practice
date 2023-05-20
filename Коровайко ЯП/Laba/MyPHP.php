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
$a = true;
$e = 0.0001;
$x = 3;
$i = 0;
/*
 3*$i - 14 + exp($i) - exp(-$i)
 f(x)  = 3x - 14 + e^x - e^-x
 f'(x) = (3e^x + e^2x +1)/ e^x
f"(x) = (e^2x -1)/e^x
При 1 f(x) * f"(x) < 0, поэтому берём 3
*/
do{
    $x = $x - (3*$x - 14 + exp($x) - exp(-$x))/((3*exp($x) + exp(2*$x) +1 )/ exp($x));
    $i++;
    if ((3*$x - 14 + exp($x) - exp(-$x))/((3*exp($x) + exp(2*$x) +1 )/ exp($x)) < $e){
        echo "Корень =".$x.'<br>';
        echo "Итерация: ". $i;
        break;
    }
}
while($a == true)
?>
</body>
</html>