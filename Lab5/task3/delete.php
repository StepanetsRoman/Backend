<?php
$pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
$pdo->prepare("DELETE FROM employees WHERE id = ?")->execute([$_GET['id']]);
header("Location: index.php");
exit;
