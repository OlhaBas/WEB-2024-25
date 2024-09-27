<?php
session_start();

// час неактивності 5 хвилин
$inactive_time_limit = 300;

// перевірка останньої активності
if (isset($_SESSION['last_activity']))
{
    $time_inactive = time() - $_SESSION['last_activity'];

    if ($time_inactive > $inactive_time_limit)
    {
        session_unset();
        session_destroy();
        header("Location: session_timeout.php");
        exit();
    }
}

// оновлення часу
$_SESSION['last_activity'] = time();

// Фіксований  логін і пароль
$valid_login = 'olha';
$valid_password = 'olha123';

$error_message = "";

// обробка форми входу
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['login']) && isset($_POST['password']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

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
}
?>
