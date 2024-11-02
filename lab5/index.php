<?php

$host = 'mysql-db';
$db = 'shop_db';
$user = 'localhost';
$password = '';

try
{
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Підключення до бази даних успішне!<br>";
}
catch (PDOException $e)
{
    echo "Помилка підключення: " . $e->getMessage();
}

require_once 'classes/product.php';
require_once 'classes/discounted_product.php';
require_once 'classes/category.php';

$product1 = new product("Ноутбук", 15000, "Ноутбук з діагоналлю 15.6 дюймів.");
$product2 = new discounted_product("Смартфон", 10000, "Смартфон з 64 ГБ пам'яті.", 10);

$electronics = new category("Електроніка");
$electronics->addProduct($product1);
$electronics->addProduct($product2);

$electronics->showProducts();
?>