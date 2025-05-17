<?php
session_start();

$dsn = "mysql:host=localhost;dbname=lab5;charset=utf8";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}

// Реєстрація
if (isset($_POST['register'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if ($login && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        if ($stmt->rowCount() > 0) {
            $msg = "Користувач вже існує!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $pdo->prepare("INSERT INTO users (login, password) VALUES (?, ?)")->execute([$login, $hash]);
            $msg = "Реєстрація успішна!";
        }
    } else {
        $msg = "Усі поля обов’язкові!";
    }
}

// Авторизація
if (isset($_POST['login_btn'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
    } else {
        $msg = "Невірний логін або пароль!";
    }
}

// Вихід
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Видалення
if (isset($_POST['delete'])) {
    $id = $_SESSION['user']['id'];
    $pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
    session_destroy();
    header("Location: index.php");
    exit();
}

// Зміна
if (isset($_POST['update'])) {
    $id = $_SESSION['user']['id'];
    $newLogin = trim($_POST['login']);
    $newPass = trim($_POST['password']);
    $hash = password_hash($newPass, PASSWORD_DEFAULT);
    $pdo->prepare("UPDATE users SET login = ?, password = ? WHERE id = ?")->execute([$newLogin, $hash, $id]);
    $_SESSION['user']['login'] = $newLogin;
    $msg = "Дані оновлено!";
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна №5 — Авторизація</title>
</head>
<body>
<h2>Система користувачів</h2>

<?php if (isset($_SESSION['user'])): ?>
    <p>Вітаємо, <?= htmlspecialchars($_SESSION['user']['login']) ?>!</p>
    <form method="post">
        Новий логін: <input name="login" required><br>
        Новий пароль: <input name="password" type="password" required><br>
        <button name="update">Оновити дані</button>
    </form>
    <form method="post">
        <button name="delete">Видалити профіль</button>
    </form>
    <p><a href="?logout">Вийти</a></p>

<?php else: ?>
    <h3>Вхід</h3>
    <form method="post">
        Логін: <input name="login" required><br>
        Пароль: <input name="password" type="password" required><br>
        <button name="login_btn">Увійти</button>
    </form>

    <h3>Реєстрація</h3>
    <form method="post">
        Логін: <input name="login" required><br>
        Пароль: <input name="password" type="password" required><br>
        <button name="register">Зареєструватися</button>
    </form>
<?php endif; ?>

<?php if (!empty($msg)) echo "<p style='color:red;'>$msg</p>"; ?>
</body>
</html>
