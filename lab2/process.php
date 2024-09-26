<?php
// process.php – Обробка завантаження файлів

// директорія для зберігання файлів
$uploadDir = 'uploads/';

// Перевірка, чи було завантажено файл методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']))
{
    $file = $_FILES['file'];

    // Отримання інформації про файл
    $fileName = basename($file['name']);
    $fileSize = $file['size'];
    $fileTmpPath = $file['tmp_name'];
    $fileType = mime_content_type($fileTmpPath);

    // Дозволені типи файлів
    $allowedTypes = ['image/png', 'image/jpeg'];
    $maxFileSize = 2 * 1024 * 1024; // до 2 МБ

    // перевірка чи файл був успішно завантажений
    if (is_uploaded_file($fileTmpPath))
    {
        // перевірка типу та розміру файлу
        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize)
        {
            if (!is_dir($uploadDir))
            {
                if (!mkdir($uploadDir, 0755, true))
                {
                    die("Не вдалося створити директорію для завантаження файлів.");
                }
            }

            // шлях до файлу
            $uploadFilePath = $uploadDir . $fileName;

            // п наявності файлу з таким самим ім'ям
            if (file_exists($uploadFilePath))
            {
                // унікальне ім'я файлу
                $fileInfo = pathinfo($fileName);
                $uniqueSuffix = '_' . time();
                $newFileName = $fileInfo['filename'] . $uniqueSuffix . '.' . $fileInfo['extension'];
                $uploadFilePath = $uploadDir . $newFileName;

                echo "<p style='color: orange;'>Файл з ім'ям '<strong>$fileName</strong>' вже існує. Завантаження з новим іменем: '<strong>$newFileName</strong>'.</p>";
                $fileName = $newFileName;
            }

            // переміщення файлу до цільової директорії
            if (move_uploaded_file($fileTmpPath, $uploadFilePath))
            {
                echo "<p style='color: green;'>Файл успішно завантажений.</p>";
                echo "<ul>
                        <li><strong>Ім'я файлу:</strong> " . htmlspecialchars($fileName) . "</li>
                        <li><strong>Тип файлу:</strong> " . htmlspecialchars($fileType) . "</li>
                        <li><strong>Розмір файлу:</strong> " . round($fileSize / 1024, 2) . " КБ</li>
                      </ul>";
                echo "<p><a href='$uploadFilePath' download>Завантажити файл</a></p>";
            } else
            {
                echo "<p style='color: red;'>Помилка при збереженні файлу.</p>";
            }
        } else
        {
            echo "<p style='color: red;'>Недійсний тип файлу або файл перевищує розмір 2 МБ.</p>";
        }
    } else
    {
        echo "<p style='color: red;'>Файл не був завантажений.</p>";
    }

    echo "<p><a href='index.html'>Повернутися на головну сторінку</a></p>";
} else
{
    echo "<p style='color: red;'>Немає файлу для завантаження.</p>";
    echo "<p><a href='index.html'>Повернутися на головну сторінку</a></p>";
}
?>
