<?php
function readWords($filename) {
    return str_word_count(file_get_contents($filename), 1);
}

$fileA = "fileA.txt";
$fileB = "fileB.txt";

$wordsA = readWords($fileA);
$wordsB = readWords($fileB);

// Унікальні
$onlyA = array_diff($wordsA, $wordsB);
// Спільні
$both = array_intersect($wordsA, $wordsB);
// Часто вживані
$all = array_merge($wordsA, $wordsB);
$counts = array_count_values($all);
$frequent = array_filter($counts, fn($v) => $v > 2);
$frequentWords = array_keys($frequent);

// Запис у файли
file_put_contents("onlyA.txt", implode(" ", $onlyA));
file_put_contents("both.txt", implode(" ", $both));
file_put_contents("frequent.txt", implode(" ", $frequentWords));

// Видалення файлу
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $filename = $_POST['filename'];
    if (file_exists($filename)) {
        unlink($filename);
        $msg = "Файл $filename успішно видалено.";
    } else {
        $msg = "Файл не знайдено.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Порівняння слів у файлах</title></head>
<body>
    <h2>Файли створено:</h2>
    <ul>
        <li>onlyA.txt</li>
        <li>both.txt</li>
        <li>frequent.txt</li>
    </ul>

    <h3>Видалити файл:</h3>
    <form method="post">
        <input type="text" name="filename" placeholder="Введіть ім’я файлу (наприклад, both.txt)">
        <button type="submit">Видалити</button>
    </form>

    <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
</body>
</html>
