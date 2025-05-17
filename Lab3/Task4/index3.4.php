<?php
$uploadDir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    if ($file['error'] === 0) {
        $targetPath = $uploadDir . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetPath);
        $message = "Зображення успішно завантажено!";
        $imagePath = $targetPath;
    } else {
        $message = "Помилка при завантаженні зображення.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Завантаження зображення</title>
</head>
<body>
    <h2>Завантажити зображення</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Завантажити</button>
    </form>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    <?php if (!empty($imagePath)): ?>
        <img src="<?= htmlspecialchars($imagePath) ?>" width="300">
    <?php endif; ?>
</body>
</html>
