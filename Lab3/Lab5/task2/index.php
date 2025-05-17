<?php
$dsn = "mysql:host=localhost;dbname=lab5;charset=utf8";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Помилка підключення до БД");
}

$products = $pdo->query("SELECT * FROM tov ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Список товарів</h2>
<a href="insert.php">➕ Додати товар</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Назва</th><th>Ціна</th><th>Кількість</th><th>Категорія</th><th>Дія</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= $p['price'] ?></td>
        <td><?= $p['quantity'] ?></td>
        <td><?= htmlspecialchars($p['category']) ?></td>
        <td>
            <form method="post" action="delete.php" style="display:inline;">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <button type="submit" onclick="return confirm('Видалити товар?')">🗑 Видалити</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
