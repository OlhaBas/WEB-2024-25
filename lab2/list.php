<?php
// директорія для файлів
$directory = 'uploads/';

// перевірка чи існує директорія
if (is_dir($directory))
{
    $files = array_diff(scandir($directory), array('..', '.'));

    // перевірка чи є файли
    if (count($files) > 0)
    {
        foreach ($files as $file)
        {
            echo $file . PHP_EOL;
        }
    } else
    {
        echo "Файли не були знайдені.";
    }
} else
{
    echo "Директорії не існує.";
}
?>
