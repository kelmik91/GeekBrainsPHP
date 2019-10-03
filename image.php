<?php
$link = mysqli_connect("localhost", "root", "", "gbphp");
$newView = $_GET['view'] + 1;
$sql = "UPDATE image SET view={$newView} WHERE image.id = {$_GET['id']}";
$result = mysqli_query($link, $sql);

$url = "https://via.placeholder.com/";
$urlFull = $url . $_GET['address'];

echo "<img src='$urlFull' alt='image'>
      <p>Имя - {$_GET['name']}</p>
      <p>Число просмотров - {$_GET['view']}</p>
      <a href='index.php'>На главную</a>";
