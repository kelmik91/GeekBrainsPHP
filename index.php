<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $reset = $_POST['reset'];
    if ($reset) {
        $view = "";
        $number1 = 0;
        $number2 = 0;
        $operation = false;
    }
    if ($operation) {
        if ($operation == "+") {
            $result = $number1 + $number2;
        }
        if ($operation == "-") {
            $result = $number1 - $number2;
        }
        if ($operation == "*") {
            $result = $number1 * $number2;
        }
        if ($operation == "/") {
            $result = ($number2 != 0) ? $number1 / $number2 : "Деление на 0 запрещено!";
        }
    }
}

$html = <<<php
<form action="" method="post">
    <input name="number1" type="text" value="{$number1}" placeholder="Число 1"><br><br>
    <input name="number2" type="text" value="$number2" placeholder="Число 2"><br><br>
    <input name="result" type="text" value="$result" disabled/><br><br>
    <hr>
    <select name="operation" onchange="submit()">
        <option>Выберите операцию</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <hr>
    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/>
    <input name="reset" value="Reset" type="submit"/>
</form>
php;

echo $html;
?>