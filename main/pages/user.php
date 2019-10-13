<?php
function index()
{
    return 'Все пользователи';
}
function addUser()
{
    return '<img src="/img/download.jpg">';
}
function get()
{
    $data = [
        1 => [
            'price' => 1233,
            'name' => 'ПРодукт',
            "count" => 2

        ],
    ];
    return json_encode($data);
}