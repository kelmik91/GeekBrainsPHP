<?php
$url = "https://via.placeholder.com/";

$image = [
    "350/92c952",
    "350/771796",
    "350/24f355",
    "350/d32776",
    "350/f66b97",
    "350/56a8c2",
    "350/56a8c2",
    "350/b0f7cc",
];

for ($i = 0; $i < count($image); $i++) {
    $urlFull = $url . $image[$i]; //
    echo "<a href='{$urlFull}' target='_blank'>
            <img src='$urlFull' alt='image' style='width: 150px'>
          </a>";
}

$log = date('Y-m-d H:i:s') . ' Запрос index.php';
file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);