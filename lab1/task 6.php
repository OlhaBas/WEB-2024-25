<?php
// асоціативний масив з інформацією про студента
$student =
    [

    "ім'я" => "Ольга",
    "прізвище" => "Басенко",
    "вік" => 18,
    "спеціальність" => "Комп'ютерні науки"
];

// виведення кожного елемента з масиву
echo "Ім'я: " . $student["ім'я"] . "<br>";
echo "Прізвище: " . $student["прізвище"] . "<br>";
echo "Вік: " . $student["вік"] . "<br>";
echo "Спеціальність: " . $student["спеціальність"] . "<br>";

// додавання нового елемента "середній бал"
$student["середній бал"] = 5.0;

// Виведення онов. масиву
echo "Середній бал: " . $student["середній бал"] . "<br>";

?>