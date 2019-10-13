<?php
function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = clrString($_POST['login']);
        $sql = "SELECT id, login, password, name, age, is_admin
                FROM users
                WHERE login = '{$login}'";

        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        $msg = 'Неверный логин или пароль';
        if (!empty($row) && password_verify($_POST['password'],$row['password'])) {
            $_SESSION[USER_ID] = $row['id'];
            $_SESSION['LOGIN'] = $login;
            $_SESSION[IS_ADMIN] = (bool)$row['is_admin'];
            $msg = 'Добро пожаловать';
        }
        $_SESSION[MSG] = $msg;
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }

    $html =<<<php
    <a href="?p=auth&f=logout">Выход</a>
php;
    if (empty($_SESSION[USER_ID])) {
        $html =<<<php
    <form method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="submit">
    </form>
php;
    }

    return $html;
}

function logout()
{
    $_SESSION = [];
    header('Location: '. $_SERVER['HTTP_REFERER']);
    exit;
}
