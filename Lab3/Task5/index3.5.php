<?php
$root = "users/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $userDir = $root . $login;

    if (!is_dir($root)) mkdir($root);

    if (!is_dir($userDir)) {
        mkdir($userDir);
        mkdir("$userDir/video");
        mkdir("$userDir/music");
        mkdir("$userDir/photo");
        file_put_contents("$userDir/video/info.txt", "Відео файли");
        file_put_contents("$userDir/music/info.txt", "Музика");
        file_put_contents("$userDir/photo/info.txt", "Фото");
        $msg = "Папку $login створено з підпапками.";
    } else {
        $msg = "Папка з логіном $login вже існує.";
    }
}
?>

<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Створення папки користувача</title></head>
<body>
    <h2>Створити каталог користувача</h2>
    <form method="post">
        <input type="text" name="login" placeholder="Логін" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Створити</button>
    </form>
    <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
</body></html>
