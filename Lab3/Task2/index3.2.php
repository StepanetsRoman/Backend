<?php
session_start();

$loginSuccess = false;

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === 'Admin' && $_POST['password'] === 'password') {
        $_SESSION['auth'] = true;
    } else {
        $_SESSION['auth'] = false;
        $error = "Невірний логін або пароль!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index3.2.modified.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<body>
<?php if (!empty($_SESSION['auth'])): ?>
    <h2>Добрий день, Admin!</h2>
    <a href="?logout=1">Вийти</a>
<?php else: ?>
    <h2>Вхід</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Логін: <input type="text" name="login"></label><br>
        <label>Пароль: <input type="password" name="password"></label><br>
        <button type="submit">Увійти</button>
    </form>
<?php endif; ?>
</body>
</html>
