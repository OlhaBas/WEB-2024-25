<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина покупок</title>
</head>
<body>
<h1>Корзина покупок</h1>

<h2>Додати товар до корзини:</h2>
<form method="POST" action="cart_handler.php">
    <label for="item">Назва товару:</label>
    <input type="text" name="item" id="item" required>
    <button type="submit">Додати</button>
</form>

<h2>Товари у вашій корзині (сесія):</h2>
<ul>
    <?php session_start(); ?>
    <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $cart_item): ?>
            <li><?php echo htmlspecialchars($cart_item); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Корзина порожня.</li>
    <?php endif; ?>
</ul>
<form method="POST" action="cart_handler.php">
    <button type="submit" name="clear_cart">Очистити корзину</button>
</form>

<h2>Попередні покупки (cookie):</h2>
<ul>
    <?php
    if (isset($_COOKIE['previous_purchases']))
    {
        $previous_purchases = unserialize($_COOKIE['previous_purchases']);
        foreach ($previous_purchases as $previous_item)
        {
            echo "<li>" . htmlspecialchars($previous_item) . "</li>";
        }
    } else
    {
        echo "<li>Немає попередніх покупок.</li>";
    }
    ?>
</ul>
<form method="POST" action="cart_handler.php">
    <button type="submit" name="clear_previous">Очистити попередні покупки</button>
</form>
</body>
</html>
