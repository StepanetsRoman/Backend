<?php
$root = "users/";

function deleteFolder($folder) {
    if (!is_dir($folder)) return;
    $files = scandir($folder);
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            $path = $folder . "/" . $file;
            is_dir($path) ? deleteFolder($path) : unlink($path);
        }
    }
    rmdir($folder);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $targetDir = $root . $login;

    if (is_dir($targetDir)) {
        deleteFolder($targetDir);
        $msg = "Папку $login успішно видалено.";
    } else {
        $msg = "Папка $login не існує.";
    }
}
?>

<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Видалення каталогу</title></head>
<body>
    <h2>Видалити каталог користувача</h2>
    <form method="post">
        <input type="text" name="login" placeholder="Логін" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Видалити</button>
    </form>
    <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
</body></html>
