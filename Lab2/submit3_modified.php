<?php
session_start();

$_SESSION['name'] = $_POST['name'] ?? '';
$_SESSION['surname'] = $_POST['surname'] ?? '';
$_SESSION['email'] = $_POST['email'] ?? '';

echo "<h2>Отримані дані</h2>";
echo "Ім'я: " . htmlspecialchars($_SESSION['name']) . "<br>";
echo "Прізвище: " . htmlspecialchars($_SESSION['surname']) . "<br>";
echo "Email: " . htmlspecialchars($_SESSION['email']) . "<br>";

// Обробка фото
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $imgPath = "uploads/" . basename($_FILES['photo']['name']);
    if (!is_dir("uploads")) mkdir("uploads");
    move_uploaded_file($_FILES['photo']['tmp_name'], $imgPath);
    echo "<p>Фото:</p><img src='$imgPath' width='150'>";
} else {
    echo "<p>Фото не завантажено.</p>";
}
echo "<p><a href='index3_modified.php'>Назад</a></p>";
?>
