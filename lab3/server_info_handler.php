<?php
// перевірка чи метод запиту є ПОСТ
if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    // якщо метод запиту не ПОСТ то перенаправляємо на іншу сторінку
    header("Location: another_page.php");
    exit();
}

// отримання інформації з $_SERVER
$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD'];
$script_filename = $_SERVER['SCRIPT_FILENAME'];
?>