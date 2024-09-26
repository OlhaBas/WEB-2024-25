<?php
// text.php – Обробка введення тексту та відображення log.txt

// шлях до лог-файлу
$logFile = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logData']))
{
    $logData = trim($_POST['logData']);

    // перевірка на порожній текст
    if (!empty($logData))
    {
        $entry = date('Y-m-d H:i:s') . " - " . $logData . PHP_EOL;

        // запис у файл log.txt
        if (file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX))
        {
            $message = "<p style='color: green;'>Дані успішно записані у файл log.txt.</p>";
        } else
        {
            $message = "<p style='color: red;'>Помилка при записі даних у файл log.txt.</p>";
        }
    } else
    {
        $message = "<p style='color: red;'>Введіть текст для запису.</p>";
    }
} else
{
    $message = "";
}

// Читання лог-файлу
if (file_exists($logFile))
{
    $logContent = file_get_contents($logFile);
    // захист від XSS
    $safeLogContent = nl2br(htmlspecialchars($logContent));
} else
{
    $safeLogContent = "<p>Файл log.txt не знайдено.</p>";
}

?>
