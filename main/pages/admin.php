<?php
isAdmin();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$sql = "SELECT * FROM order";
$res = mysqli_query(connect(), $sql);
while ($row = mysqli_fetch_assoc($res)) {
}
var_dump($row);
if (empty($row) || $row == NULL) {
    $html .= 'Заказов нет';
    exit;
}
foreach ($row as $value) {
    $html .= <<<php
        <p>Заказ № {$value['id']} разместил {$value['login']}</p>
        <p>Заказано: {$value[item]}</p>
        <p>Телефон: {$value[phone]}</p>
php;

}