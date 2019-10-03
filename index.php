<?php
$link = mysqli_connect("localhost", "root", "", "gbphp");
$url = "https://via.placeholder.com/";

$sql = "SELECT id, address, name, view FROM image";

$result = mysqli_query($link, $sql);

$arr = [];
while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
}

for ($i = 0; $i < count($arr); $i++) {
    $urlFull = $url . $arr[$i]['address'];
    $id = $arr[$i]['id'];
    $address = $arr[$i]['address'];
    $name = $arr[$i]['name'];
    $view = $arr[$i]['view'];
    echo "<a href='image.php?id={$id}&address={$address}&name={$name}&view={$view}'>
            <img src='$urlFull' alt='image' style='width: 150px'>
            <b>{$arr[$i]['name']}</b>
          </a>";
}
