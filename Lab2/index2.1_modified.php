<?php
echo "<h2>Завдання 1. Робота з рядками (Модифікована версія)</h2>";

// 1. Заміна символів
function replaceSymbols($text, $search, $replace) {
    return str_replace($search, $replace, $text);
}

$text = "Привіт світ";
$search = "і";
$replace = "ї";
echo "<b>1)</b> Результат заміни: " . replaceSymbols($text, $search, $replace) . "<br>";

// 2. Сортування назв міст
function sortCities($cityString) {
    $cities = explode(" ", $cityString);
    sort($cities, SORT_NATURAL | SORT_FLAG_CASE);
    return implode(", ", $cities);
}

$inputCities = "Харків Львів Київ Одеса";
echo "<b>2)</b> Відсортовані міста: " . sortCities($inputCities) . "<br>";

// 3. Отримання імені файлу без розширення
function extractFilename($path) {
    return pathinfo($path, PATHINFO_FILENAME);
}

$filepath = "D:\WebServers\home\testsite\www\example.doc";
echo "<b>3)</b> Ім'я файлу без розширення: " . extractFilename($filepath) . "<br>";

// 4. Різниця між датами
function dateDiffInDays($d1, $d2) {
    $t1 = DateTime::createFromFormat("d-m-Y", $d1);
    $t2 = DateTime::createFromFormat("d-m-Y", $d2);
    return $t1->diff($t2)->days;
}

$date1 = "01-03-2024";
$date2 = "15-03-2024";
echo "<b>4)</b> Різниця в днях: " . dateDiffInDays($date1, $date2) . "<br>";

// 5. Генератор та перевірка паролів
function generatePassword($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
    return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}

function isStrongPassword($password) {
    return preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/[0-9]/', $password) &&
           preg_match('/[^a-zA-Z0-9]/', $password) &&
           strlen($password) >= 8;
}

$pwd = generatePassword(12);
echo "<b>5)</b> Згенерований пароль: $pwd<br>";
echo "Пароль " . (isStrongPassword($pwd) ? "міцний ✅" : "слабкий ❌") . "<br>";
?>
