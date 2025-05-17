<?php
$dsn = "mysql:host=localhost;dbname=lab5;charset=utf8";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Помилка підключення");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = floatval($_POST['price']);
    $qty = intval($_POST['quantity']);
    $cat = $_POST['category'];

    $sql = "INSERT INTO tov (name, price, quantity, category) VALUES (?, ?, ?, ?)";
    $pdo->prepare($sql)->execute([$name, $price, $qty, $cat]);
    header("Location: index.php");
}
?>

<h2>Додати товар</h2>
<form method="post">
    Назва: <input name="name" required><br>
    Ціна: <input name="price" type="number" step="0.01" required><br>
    Кількість: <input name="quantity" type="number" required><br>
    Категорія: <input name="category" required><br>
    <button type="submit">Зберегти</button>
</form>
<a href="index.php">Назад</a>
