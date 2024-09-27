<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie приклад</title>
</head>
<body>
<?php if (isset($_COOKIE['username'])): ?>
<h1>Привіт, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</h1>
<form method="POST" action="cookie_handler.php">
    <button type="submit" name="delete_cookie">Видалити cookie</button>
</form>
<?php else: ?>
<form method="POST" action="cookie_handler.php">
    <label for="name">Введіть ваше ім'я:</label>
    <input type="text" name="name" id="name" required>
    <button type="submit">Зберегти</button>
</form>
<?php endif; ?>
</body>
</html>
