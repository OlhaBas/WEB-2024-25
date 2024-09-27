<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сесія</title>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])): ?>
<h1>Привіт, <?php echo htmlspecialchars($_SESSION['user']); ?>! Ви увійшли на сайт.</h1>
<form method="POST" action="session_handler.php">
    <button type="submit" name="logout">Вийти</button>
</form>
<?php else: ?>
<h2>Вхід на сайт</h2>
<?php if (isset($error_message)): ?>
<p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form method="POST" action="session_handler.php">
    <label for="login">Логін:</label>
    <input type="text" name="login" id="login" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Увійти</button>
</form>
<?php endif; ?>
</body>
</html>
