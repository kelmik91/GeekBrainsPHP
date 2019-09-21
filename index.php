<?php
$a = 5;
$b = 10;

switch ($a){
    case 1 : echo '1 ';
    case 2 : echo '2 ';
    case 3 : echo '3 ';
    case 4 : echo '4 ';
    case 5 : echo '5 ';
    case 6 : echo '6 ';
    case 7 : echo '7 ';
    case 8 : echo '8 ';
    case 9 : echo '9 ';
    case 10 : echo '10 ';
    case 11 : echo '11 ';
    case 12 : echo '12 ';
    case 13 : echo '13 ';
    case 14 : echo '14 ';
    case 15 : echo "15 <br>"; break;
    default: echo 'Условие не применимо';
}

function sum($param1, $param2) {
    return $param1 + $param2;
}

function subtraction($param1, $param2) {
    return $param1 - $param2;
}

function multiplication($param1, $param2) {
    return $param1 * $param2;
}

function divide($param1, $param2) {
    return $param1 / $param2;
}

function mathOperation($arg1, $arg2, $operation) {
    if ('sum' == $operation) {
        echo sum($arg1, $arg2);
    } elseif ('subtraction' == $operation) {
        echo subtraction($arg1, $arg2);
    } elseif ('multiplication' == $operation) {
        echo multiplication($arg1, $arg2);
    } elseif ('divide' == $operation) {
        echo divide($arg1, $arg2);
    } else {
        echo "$operation - неправильный ввод <br>";
    }
}

mathOperation(10, 5, 'sum');
echo "<br>";
mathOperation(10, 5, 'subtraction');
echo "<br>";
mathOperation(10, 5, 'multiplication');
echo "<br>";
mathOperation(10, 5, 'divide');
echo "<br>";
mathOperation(10, 5, 'qwerty');
echo "<br>";

$year = 'Сейчас ' . date("Y") . ' год';
$html = <<<php
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>GeekBrain PHP</title>
</head>
<body>
<footer>{$year}</footer>
</body>
</html>
php;

echo $html;

function power($val, $pow) {
    if (1 > $pow) {
        return 1;
    }
    return $val * power($val, ($pow -1));
}

echo power(3, 2);
