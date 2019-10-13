<?php
function index()
{
    $sql = "SELECT id, name, price, inform FROM good";
    $res = mysqli_query(connect(), $sql);

    $html = '<h1>Все товары</h1>';
    while ($row = mysqli_fetch_assoc($res)) {
        $html .= <<<php
        <h2><a href="?p=good&f=getOne&id={$row['id']}">{$row['name']}</a></h2>
        <p >{$row['price']}р.</p>
        <p style="color: #3010ac">{$row['inform']}</p>
        <hr>
php;
    }
    return $html;
}

function getOne()
{
    $id = (int)$_GET['id'];
    $sql = "SELECT id, name, price, inform FROM good WHERE id = {$id}";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);

    $html = '<script src="/js/js.js"></script><h1>Информация о товаре</h1>';
    $html .= <<<php
    <h2>{$row['name']}</h2>
    <p >
        {$row['price']}р.
        <a style="cursor: pointer" onclick="addGood({$row['id']})">Добавить в корзину</a>
    </p>
    <p style="color: #3010ac">{$row['inform']}</p>
    <hr>
    <a href="{$_SERVER['HTTP_REFERER']}">Назад</a>
php;
    return $html;
}

function add()
{
    isAdmin();

    if (!empty($_POST['name'])
        && !empty($_POST['price'])
        && !empty($_POST['inform'])
    ) {
        $name = clrString($_POST['name']);
        $price = clrString($_POST['price']);
        $inform = clrString($_POST['inform']);
        $sql = "INSERT INTO good(name, price, inform) 
                VALUES ('$name', '$price', '$inform')";
        mysqli_query(connect(), $sql);
        $msg = 'Error';
        if (mysqli_insert_id(connect())) {
            $msg = 'Товар добавлен';
        }
        $_SESSION[MSG] = $msg;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    return <<<php
        <form method="post">
            <input	name="name" placeholder="name" >
            <input	name="price" placeholder="price" >
            <input	name="inform" placeholder="inform" >
            <input	type="submit">
        </form>
php;
}
