<?php
function index() {
if (empty($_SESSION[GOODS])) {
    exit;
}

$total = 0;
foreach ($_SESSION[GOODS] as $key => $good) {
    $total += $good['price'] * $good['count'];
    $html .= <<<php
        <h1>Вы приобретаете:</h1>
        <h2>{$good['name']}</h2>
        <p >
            {$good['price']}р. <br>
            Количество: {$good['count']}шт.
        </p>
        <hr>
php;
}
$html .= "<p style='color: red'>Итого: {$total}р.</p>";
$html.= "<a href='?p=order&f=bye'>Заказать</a>";
return $html;
}

function bye() {
    $login = clrString($_SESSION['LOGIN']);
    $goods = $_SESSION[GOODS];
$sql = "INSERT INTO order(login, status, item, totalPrice) 
                 VALUES ('$login','В обработке','$goods','$total')";
mysqli_query(connect(), $sql);
$_SESSION[GOODS] = [];
$html .= 'Заказ оформлен';
}