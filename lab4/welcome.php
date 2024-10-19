<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Вітаємо, " . htmlspecialchars($_SESSION['username']) . "!";
?>
