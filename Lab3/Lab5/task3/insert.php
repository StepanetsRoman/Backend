<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary']]);
    header("Location: index.php");
}
?>
<h2>Новий працівник</h2>
<form method="post">
    Ім’я: <input name="name" required><br>
    Посада: <input name="position" required><br>
    Зарплата: <input name="salary" type="number" required><br>
    <button>Зберегти</button>
</form>
<a href="index.php">Назад</a>
