<?php
    include_once 'bootstrap.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <?php
        Layout::getInstance()->include_font('Roboto Slab');
        Layout::getInstance()->include_css();
    ?>
</head>
<body>
    <h1>Главная страница сайта</h1>
    <h2>
        <a href="/catalog/">Перейти в каталог</a>
    </h2>
</body>
</html>