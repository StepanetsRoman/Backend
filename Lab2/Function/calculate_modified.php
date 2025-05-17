<?php
require_once "func.php";

$x = $_POST['num'];
$op = $_POST['operation'];
$exp = $_POST['exp'] ?? 2;

echo "<h2>Результат:</h2>";
switch ($op) {
    case 'sin': echo "sin($x) = " . my_sin($x); break;
    case 'cos': echo "cos($x) = " . my_cos($x); break;
    case 'tan': echo "tan($x) = " . my_tan($x); break;
    case 'my_tg': echo "my_tg($x) = " . my_custom_tg($x); break;
    case 'power': echo "$x^$exp = " . power($x, $exp); break;
    case 'fact': echo "$x! = " . factorial($x); break;
    default: echo "Оберіть функцію.";
}
echo "<br><a href='index_modified.php'>Назад</a>";
?>
