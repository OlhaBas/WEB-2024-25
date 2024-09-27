<?php
session_start();

// фіксований логін і пароль
$valid_login = 'olha';
$valid_password = 'olha123';

// перевірка чи була надіслана форма для входу
if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    // перевірка логіна і пароля
    if ($login === $valid_login && $password === $valid_password)
    {
        $_SESSION['user'] = $login;
        header("Location: index_session.php");
        exit();
    } else
    {
        $error_message = "Невірний логін або пароль!";
    }
}

// Перевірка на натискання кнопки "Вихід"
if (isset($_POST['logout'])) {
    session_destroy(); // очищуємо всі дані сесії
    header("Location: index_session.php");
    exit();
}
?>
