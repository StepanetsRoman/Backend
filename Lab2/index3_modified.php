<?php
session_start();

// Запис мови у cookie
if (isset($_GET['lang'])) {
    setcookie("lang", $_GET['lang'], time() + (180 * 24 * 60 * 60)); // 6 місяців
    $_COOKIE['lang'] = $_GET['lang'];
}

// Отримання мови
$langText = [
    'ukr' => 'Українська',
    'eng' => 'English',
    'deu' => 'Deutsch'
];

$lang = $_COOKIE['lang'] ?? 'ukr';
$selectedLang = $langText[$lang] ?? 'Українська';

function getValue($key) {
    return $_SESSION[$key] ?? '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Форма користувача</title>
</head>
<body>
    <h2>Головна сторінка форми</h2>
    <p>Вибрана мова: <?= $selectedLang ?></p>
    <a href="?lang=ukr">🇺🇦</a> <a href="?lang=eng">🇬🇧</a> <a href="?lang=deu">🇩🇪</a>

    <form action="submit3_modified.php" method="post" enctype="multipart/form-data">
        <label>Ім'я: <input type="text" name="name" value="<?= getValue('name') ?>"></label><br>
        <label>Прізвище: <input type="text" name="surname" value="<?= getValue('surname') ?>"></label><br>
        <label>Email: <input type="email" name="email" value="<?= getValue('email') ?>"></label><br>
        <label>Фото: <input type="file" name="photo"></label><br>
        <button type="submit">Надіслати</button>
    </form>
</body>
</html>
