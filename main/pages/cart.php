<?php
function index()
{
    $html = "<h1>Корзина</h1>
            <script src=\"/js/js.js\"></script><h1>Информация о товаре</h1> ";

    if (empty($_SESSION[GOODS])) {
        return $html . "<p>Нет товаров</p>";
    }
    $total = 0;
    foreach ($_SESSION[GOODS] as $key => $good) {
        $total += $good['price'] * $good['count'];
        $html .= <<<php
        <h2>{$good['name']}</h2>
        <p >
            {$good['price']}р. <br>
            Количество: {$good['count']}шт.
        </p>
        <span style="cursor: pointer" onclick="dellGood({$key})">Удалить из корзины</span>
        <hr>
php;
    }
    $html .= "<p style='color: red'>Итого: {$total}р.</p>";
    $html.= "<a href='?p=order'>Купить</a>";
    return $html;
}
function add()
{
    $id = (int)$_GET['id'];
    if (empty($id)) {
        echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
        exit;
    }

    $sql = "SELECT id, name, price, inform FROM good WHERE id = {$id}";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);

    if (empty($row)) {
        echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
        exit;
    }

    if (empty($_SESSION[GOODS][$id])) {
        $_SESSION[GOODS][$id] = [
            'name' => $row['name'],
            'price' => $row['price'],
            'count' => 1,
        ];
    } else {
        $_SESSION[GOODS][$id]['count'] += 1;
    }
    echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
    exit;
}

function dell()
{
    $id = (int)$_GET['id'];
    if (empty($id)) {
        echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
        exit;
    }

    $sql = "SELECT id, name, price, inform FROM good WHERE id = {$id}";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);

    if (empty($row)) {
        echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
        exit;
    }

    if ($_SESSION[GOODS][$id]['count'] <= 1) {
        unset($_SESSION[GOODS][$id]);
    } else {
        $_SESSION[GOODS][$id]['count'] -= 1;
    }
    echo empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
    exit;
}