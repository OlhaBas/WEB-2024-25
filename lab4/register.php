<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password))
    {
        echo "Будь ласка, заповніть всі поля.";
        exit;
    }

    $hashed_password = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            echo "Реєстрація успішна!";
        } else {
            echo "Помилка: Не вдалося зареєструвати користувача.";
        }
        $stmt->close();
    }

    $conn->close();
}
?>
