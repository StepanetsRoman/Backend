<?php
require_once "func.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Математичні функції</title>
</head>
<body>
    <h2>Обчислення математичних функцій</h2>
    <form action="calculate_modified.php" method="post">
        <label>Введіть число: <input type="number" name="num" step="any" required></label><br>
        <label>Введіть степінь (для x^y): <input type="number" name="exp" value="2"></label><br>
        <select name="operation">
            <option value="sin">sin(x)</option>
            <option value="cos">cos(x)</option>
            <option value="tan">tan(x)</option>
            <option value="my_tg">my_tg(x)</option>
            <option value="power">x^y</option>
            <option value="fact">x!</option>
        </select>
        <br><br>
        <button type="submit">Обчислити</button>
    </form>
</body>
</html>
