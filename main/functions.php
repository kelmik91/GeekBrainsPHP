<?php
function isAdmin()
{
    if (empty($_SESSION[IS_ADMIN])) {
        $_SESSION[MSG] = 'Нет прав';
        header('Location: ?');
        exit;
    }
}