<?php
// перевірка чи користувач надіслав ім'я через форму
if (isset($_POST['name']))
{
    $name = $_POST['name'];
    setcookie('username', $name, time() + (7 * 24 * 60 * 60)); // збереження кукі на 7 днів
    header("Location: index_cookie.php"); // Перенаправлення на сторінку після обробки
    exit();
}

// перевірка на натискання кнопки "Видалити cookie"
if (isset($_POST['delete_cookie']))
{
    setcookie('username', '', time() - 3600); // видалення кукі
    header("Location: index_cookie.php"); // перезавантажуємо стр
    exit();
}
?>
