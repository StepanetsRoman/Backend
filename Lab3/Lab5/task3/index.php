<?php
$pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");

$rows = $pdo->query("SELECT * FROM employees ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

$avgSalary = $pdo->query("SELECT AVG(salary) AS avg FROM employees")->fetchColumn();
$byPosition = $pdo->query("SELECT position, COUNT(*) as total FROM employees GROUP BY position")->fetchAll();
?>

<h2>Працівники компанії</h2>
<a href="insert.php">➕ Додати працівника</a>
<table border="1" cellpadding="5">
    <tr><th>ID</th><th>ПІБ</th><th>Посада</th><th>Зарплата</th><th>Дія</th></tr>
    <?php foreach ($rows as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= htmlspecialchars($r['name']) ?></td>
        <td><?= htmlspecialchars($r['position']) ?></td>
        <td><?= $r['salary'] ?></td>
        <td>
            <a href="update.php?id=<?= $r['id'] ?>">✏️</a>
            <a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Видалити?')">🗑</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Статистика</h3>
<p>Середня зарплата: <?= number_format($avgSalary, 2) ?> грн</p>
<ul>
    <?php foreach ($byPosition as $row): ?>
    <li><?= $row['position'] ?>: <?= $row['total'] ?> осіб</li>
    <?php endforeach; ?>
</ul>
