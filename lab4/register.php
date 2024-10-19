<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
</head>
<body>
    <h2>Form of Register</h2>
    <form action="register.php" method="post">
        <label for="username">User name:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Sign in">
    </form>
</body>
</html>
