<?php

$a = 0;
while (100 >= $a) {
    if ($a % 3 == 0) {
        echo "$a ";
    }
    $a++;
}

echo "<hr>";

$i = 0;
do {
    if (0 == $i){
        echo "$i - ноль. <br>";
    } elseif ($i % 2 == 0){
        echo "$i - четное число <br>";
    } else {
        echo "$i - нечетное число <br>";
    }

    $i++;
} while (10 >= $i);


echo "<hr>";

$arrRegion = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Касимов", "Гусь-Железный", "Тума"],
];

foreach ($arrRegion as $myKey => $myValue) {
    echo "$myKey: <br>";
    foreach ($myValue as $myCity) {
        echo "$myCity. ";
    }
    echo "<br>";
}

echo "<hr>";

function translit($text){
    $bukvi = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'tch',
        'ъ' => '"',
        'ы' => 'y',
        'ь' => '`',
        'э' => 'eh',
        'ю' => 'yu',
        'я' => 'ya',
        ' ' => '_', // <-- Задание №9
    ];
    $textFun = mb_strtolower($text);
    $textOut ='';
    for ($i = 0; $i <= iconv_strlen($textFun); $i++) {
        foreach ($bukvi as $key => $item) {
            $char = mb_substr($textFun, $i, 1);
            if ($char == $key && mb_substr($text, $i, 1) === mb_strtoupper(mb_substr($text, $i, 1))) {
                $textOut .= mb_strtoupper($item);
            } elseif ($char == $key) {
                $textOut .= $item;
            }
        }
    }
    return $textOut;
}
$text = "Привет Мир";
echo "$text - ";
echo translit($text);

echo "<hr>";

function zamena($text) {
    return str_replace(' ', '_', $text);
}
echo zamena($text);

echo "<hr>";

$menu = [
    "<ul>Меню1</ul>" => ["<li>Меню1-1</li>", "<li>Меню1-2</li>", "<li>Меню1-3</li>"],
    "<ul>Меню2</ul>" => ["<li>Меню2-1</li>", "<li>Меню2-2</li>", "<li>Меню2-3</li>"],
    "<ul>Меню3</ul>" => ["<li>Меню3-1</li>", "<li>Меню3-2</li>", "<li>Меню3-3</li>"],
];

foreach ($menu as $key => $menuValues) {
    echo $key;
    foreach ($menuValues as $myMenu) {
        echo $myMenu;
    }
}

echo "<hr>";

for ($i = 0; $i < 10; print $i++);

echo "<hr>";

foreach ($arrRegion as $myKey => $myValue) {
    echo "$myKey: <br>";
    foreach ($myValue as $myCity) {
        if (mb_substr($myCity, 0, 1) == 'К'){
            echo "$myCity. ";
        }
    }
    echo "<br>";
}