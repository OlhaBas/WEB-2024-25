<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
</head>
<body>
    <h2>Log In Form</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Увійти">
    </form>
</body>
</html>

<?php
session_start();
require_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password))
    {
        echo "Будь ласка, заповніть всі поля.";
        exit;
    }

    $sql = "SELECT id, password FROM users WHERE username = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1)
        {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (md5($password) == $hashed_password) 
            {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                
                header("Location: welcome.php");
                exit;
            } else 
            {
                echo "Невірний пароль.";
            }
        } else 
        {
            echo "Користувача з таким ім'ям не існує.";
        }
        $stmt->close();
    }

    $conn->close();
}
?>
