<?php
// оголошення змінних типу string, int, float, boolean
$name = "Оля";
$age = 19;
$height = 1.62;
$is_student = true;

// виводим змінні
echo "Ім'я: $name <br>";
echo "Вік: $age <br>";
echo "Зріст: $height м <br>";
echo "Студент: " . ($is_student ? 'Так' : 'Ні') . "<br>";

// виведення типу змінних
var_dump($name);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($height);
echo "<br>";
var_dump($is_student);
?>
