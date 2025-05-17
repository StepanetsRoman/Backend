<?php
$filename = "comments_modified.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    if ($name && $comment) {
        $line = $name . "||" . $comment . PHP_EOL;
        file_put_contents($filename, $line, FILE_APPEND);
    }
}

function getComments($file) {
    $comments = [];
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            list($name, $comment) = explode("||", trim($line));
            $comments[] = ['name' => $name, 'comment' => $comment];
        }
    }
    return $comments;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Коментарі</title>
</head>
<body>
    <h2>Залишити коментар</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Ім'я" required><br>
        <textarea name="comment" placeholder="Коментар" required></textarea><br>
        <button type="submit">Додати</button>
    </form>

    <h3>Усі коментарі:</h3>
    <table border="1" cellpadding="5">
        <tr><th>Ім’я</th><th>Коментар</th></tr>
        <?php foreach (getComments($filename) as $row): ?>
        <tr><td><?= htmlspecialchars($row['name']) ?></td><td><?= htmlspecialchars($row['comment']) ?></td></tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
