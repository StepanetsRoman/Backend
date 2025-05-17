<?php
$pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("UPDATE employees SET name=?, position=?, salary=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary'], $id]);
    header("Location: index.php");
    exit;
}

$data = $pdo->query("SELECT * FROM employees WHERE id = $id")->fetch();
?>
<h2>Редагування працівника</h2>
<form method="post">
    Ім’я: <input name="name" value="<?= $data['name'] ?>" required><br>
    Посада: <input name="position" value="<?= $data['position'] ?>" required><br>
    Зарплата: <input name="salary" value="<?= $data['salary'] ?>" type="number" required><br>
    <button>Оновити</button>
</form>
<a href="index.php">Назад</a>
