<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $pdo = new PDO("mysql:host=localhost;dbname=lab5;charset=utf8", "root", "");
    $pdo->prepare("DELETE FROM tov WHERE id = ?")->execute([$id]);
}
header("Location: index.php");
exit();
