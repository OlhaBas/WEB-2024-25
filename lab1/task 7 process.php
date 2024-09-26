<?php
// перевіряємо, чи дані були надіслані через форму
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // отримуємо дані з форми
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // перевірка на пусті поля
    if (empty($first_name) || empty($last_name))
    {
        echo "Будь ласка, заповніть всі поля.";
    } else
    {
        // виводимо наше привітання
        echo "Привіт, " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "!";
    }
} else
{
    echo "Будь ласка, заповніть форму.";
}
?>
