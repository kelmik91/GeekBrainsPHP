<?php
session_start();
include ("bd/connect.php");
include ("config.php");
include ("functions.php");

$page = !empty($_GET['p']) ? $_GET['p'] : 'index';
$function = !empty($_GET['f']) ? $_GET['f'] : 'index';

$dir = __DIR__ . '/';

if (!file_exists($dir . '/pages/' . $page . '.php' )) {
    $page = 'index';
}
include ($dir . '/pages/' . $page . '.php');
if (function_exists($function)) {
    $html = $function();
}

$msg = '';
if (!empty($_SESSION[MSG])) {
    $msg = $_SESSION[MSG];
    unset($_SESSION[MSG]);
}

$count = empty($_SESSION[GOODS]) ? 0 : count($_SESSION[GOODS]);
$adminLink = empty($_SESSION[IS_ADMIN]) ? '' : '<li><a href="?p=good&f=add">Добавить товар</a></li>
		<li><a href="?p=good&f=dell">Удалить товар</a></li>
		<li><a href="?p=admin&">Админка</a></li>';

$html_t = file_get_contents(__DIR__ . '/main.tmpl');
echo str_replace(
    ['{CONTENT}', '{MSG}', '{COUNT}', '{adminLink}'],
    [$html, $msg, $count, $adminLink],
    $html_t
);