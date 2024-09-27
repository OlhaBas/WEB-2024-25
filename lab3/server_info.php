<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інформація про сервер</title>
</head>
<body>
<h2>Інформація про сервер та запит</h2>
<p><strong>IP-адреса клієнта:</strong> <?php echo $client_ip; ?></p>
<p><strong>Назва та версія браузера:</strong> <?php echo $user_agent; ?></p>
<p><strong>Назва скрипта, що виконується:</strong> <?php echo $script_name; ?></p>
<p><strong>Метод запиту:</strong> <?php echo $request_method; ?></p>
<p><strong>Шлях до файлу на сервері:</strong> <?php echo $script_filename; ?></p>
</body>
</html>
