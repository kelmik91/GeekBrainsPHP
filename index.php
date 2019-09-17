<?php
$title = "Site";
$h1 = "<h1>Заголовок</h1>";
$year = 2019;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
</head>
<body>

Задание 3
<br>
<?php
$a = 5;
$b = '05';
var_dump($a == $b);         // Почему true? | При не строгом сравнении переменные приводятся к типу с высшем приоритетом, в данном случае к числу
var_dump((int)'012345');     // Почему 12345? | В целочисленных типах 0 в начале отбрасывается за ненадобностью
var_dump((float)123.0 === (int)123.0); // Почему false? | Строгое сравнение включает в себя и сравнение типов данных
var_dump((int)0 === (int)'hello, world'); // Почему true? | Если строка преобразованая в число начинается с верного числового значения, будет использовано это значение. Иначе значением будет 0
?>

<hr>
Задание 4
<br>
<?php
echo $title;
echo $h1;
echo $year;
?>

<hr>
Задание 5
<br>
<?php
echo "$a $b <br>";

[$a, $b] = [$b, $a];

echo "$a $b <br>";
?>

</body>
</html>
