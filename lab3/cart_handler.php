<?php
session_start();

// ініціалізація корзин, якщо вона її немає
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = [];
}

// обробка додавання товару до корзини
if (isset($_POST['item']))
{
    $item = $_POST['item'];
    $_SESSION['cart'][] = $item;

    // додаємо товар до кукі для нашихпопередніх покупок
    if (isset($_COOKIE['previous_purchases']))
    {
        $previous_purchases = unserialize($_COOKIE['previous_purchases']);
    } else
    {
        $previous_purchases = [];
    }

    $previous_purchases[] = $item;
    setcookie('previous_purchases', serialize($previous_purchases), time() + (30 * 24 * 60 * 60)); // зберігання на 30 днів

    header("Location: cart.php"); // перезавантажуємо стр
    exit();
}

// очищення корзини
if (isset($_POST['clear_cart']))
{
    $_SESSION['cart'] = [];
}

// очищення кукі з попередніми покупками
if (isset($_POST['clear_previous']))
{
    setcookie('previous_purchases', '', time() - 3600);
    header("Location: cart.php"); // перезавантажуємо стр
    exit();
}
?>
