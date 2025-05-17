<?php
$size = $_GET['size'] ?? $_COOKIE['font_size'] ?? '16px';
setcookie('font_size', $size, time() + 86400 * 30); // зберігаємо шрифт на 30 днів
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Зміна шрифту за допомогою Cookie</title>
    <style>
        body {
            font-size: <?= htmlspecialchars($size) ?>;
        }
        a {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <h2>Обери розмір шрифту:</h2>
    <a href="?size=24px">Великий</a>
    <a href="?size=18px">Середній</a>
    <a href="?size=12px">Маленький</a>

    <p>Цей текст змінює розмір відповідно до обраного значення. Поточний розмір: <?= htmlspecialchars($size) ?>.</p>
</body>
</html>
