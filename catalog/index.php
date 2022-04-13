<?php
include_once '../bootstrap.php';
$products = [
    [
        'name' => 'Товар 1',
        'description' => 'Описание товара 1',
    ],
    [
        'name' => 'Товар 2',
        'description' => 'Описание товара 2',
    ],
    [
        'name' => 'Товар 3',
        'description' => 'Описание товара 3',
    ],
    [
        'name' => 'Товар 4',
        'description' => 'Описание товара 4',
    ]
];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>

    <?php
    Layout::getInstance()->add_static('products.css');
    // Layout::getInstance()->add_static('products.css'); проверка на уникальность
    Layout::getInstance()->add_static('script.js');
    Layout::getInstance()->include_css();
    Layout::getInstance()->include_scripts();
    
    ?>
</head>

<body>

    <div class="products">
        <?php foreach($products as $product):?>
        <div class="product">
            <div class="product_name">
                <?=$product['name']?>
            </div>

            <div class="product_description">
                <?=$product['description']?>
            </div>

        </div>
        <?php endforeach;?>
    </div>
    <div class="">
        <?php 
            DB::getInstance()->create_table('test');
        ?>
    </div>

</body>

</html>



