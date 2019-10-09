<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "gbphp");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT id, login, password, name FROM users WHERE login = '{$_POST['login']}'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);

    $reset = $_POST['reset'];
    if ($reset) {
        $row = [];
        setcookie('user', $row['login'], time() - 1);
    }
    if ($row['password'] == $_POST['password']) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['login'] = $row['login'];
        setcookie('user', $row['login']);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $_SESSION['name'] = isset($_COOKIE['user']) ? $_COOKIE['user'] : '';
}

$name = !empty($_SESSION['name']) ? 'Здравствуйте, ' . $_SESSION['name'] . '. Ваш логин - ' . $_SESSION['login'] : "Здравствуйте, Гость";
$button = !empty($_SESSION['name']) ? '<br><input type="submit" name="reset" value="Выйти">' : '<br><input type="text" name="login" placeholder="login">
    <input type="text" name="password" placeholder="password"><input type="submit" value="Войти">';

$item = $_GET['item'];
if ($item) {
    if (isset($_COOKIE["$item"])) {
        setcookie("$item", $_COOKIE["$item"] + 1);
    } else {
        setcookie("$item", 1);
    }
}
$dellItem = $_GET['dellItem'];
if ($dellItem) {
    if ($_COOKIE["$dellItem"] > 1) {
        setcookie("$dellItem", $_COOKIE["$dellItem"] - 1);
    } else {
        setcookie("$dellItem", '', time() - 1);
    }
}

$url = "https://via.placeholder.com/";
$image = [
    "150/92c952",
    "150/771796",
    "150/24f355"
];
$catalog = '';
for ($i = 0; $i < count($image); $i++) {
    $urlFull = $url . $image[$i]; //
    $catalog .= "<form>
    <img src='{$urlFull}' alt='image'>
    <b>Купить товар: </b>
    <input type=\"submit\" name=\"item\" value=\"item{$i}\">
    <b>Удалить товар: </b>
    <input type=\"submit\" name=\"dellItem\" value=\"item{$i}\">
</form>";
}

$basket = '';
for ($i = 0; $i <3; $i++) {
    if (isset($_COOKIE["item" . $i])) {
        $basket .= "<div>
                        <img src='{$url}{$image[$i]}' alt='image'>
                        <b>Товар {$i}. В количестве {$_COOKIE["item" . $i]}</b>
                    </div>";
    }
}

$html = <<<php
{$name}
<form method="post">
    {$button}
</form>
<div>
    <p>Корзина:</p>
    {$basket}
</div>
<hr>
{$catalog}
php;

echo $html;

?>