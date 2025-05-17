<?php
echo "<h2>Завдання 2. Робота з масивами (Модифікована версія)</h2>";

// 1. Функція для виведення повторюваних елементів масиву
function showDuplicates($array) {
    $counts = array_count_values($array);
    $duplicates = array_filter($counts, function($count) {
        return $count > 1;
    });
    echo "Повторювані елементи: " . implode(", ", array_keys($duplicates)) . "<br>";
}

$array1 = [3, 7, 2, 7, 5, 2, 9];
showDuplicates($array1);

// 2. Функція-генератор імен для тварин
function generatePetName($syllables, $length = 3) {
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $name .= $syllables[array_rand($syllables)];
    }
    return ucfirst($name);
}

$parts = ['mi', 'ka', 'zu', 'lo', 'ra', 'ti'];
echo "Ім'я тваринки: " . generatePetName($parts) . "<br>";

// 3. Масиви, об'єднання, унікальні значення, сортування
function createRandomArray() {
    $len = rand(3, 7);
    $result = [];
    for ($i = 0; $i < $len; $i++) {
        $result[] = rand(10, 20);
    }
    return $result;
}

function mergeAndSortUnique($arr1, $arr2) {
    $merged = array_merge($arr1, $arr2);
    $unique = array_unique($merged);
    sort($unique);
    return $unique;
}

$a1 = createRandomArray();
$a2 = createRandomArray();
echo "Масив 1: " . implode(", ", $a1) . "<br>";
echo "Масив 2: " . implode(", ", $a2) . "<br>";
echo "Об'єднаний унікальний масив: " . implode(", ", mergeAndSortUnique($a1, $a2)) . "<br>";

// 4. Асоціативний масив: сортування за віком або іменем
function sortUsers($users, $sortBy = 'age') {
    if ($sortBy === 'age') {
        asort($users);
    } else {
        ksort($users);
    }
    return $users;
}

$users = [
    "Olena" => 22,
    "Ihor" => 19,
    "Svitlana" => 25,
    "Bohdan" => 21
];

echo "<br>Сортування за віком:<br>";
foreach (sortUsers($users, 'age') as $name => $age) {
    echo "$name — $age<br>";
}

echo "<br>Сортування за іменем:<br>";
foreach (sortUsers($users, 'name') as $name => $age) {
    echo "$name — $age<br>";
}
?>
