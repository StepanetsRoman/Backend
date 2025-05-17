<?php
require_once 'classes/Text.php';
?>

<html lang="en">
<body>
<form action="" method="POST">
    <table border="1" cellpadding="10">
        <tr>
            <td>Оберіть файл для читання:
                <select name="readFile">
                    <option value="text1.txt">text1.txt</option>
                    <option value="text2.txt">text2.txt</option>
                    <option value="text3.txt">text3.txt</option>
                </select>
                <input type="submit" name="read" value="Прочитати">
            </td>
        </tr>
        <tr>
            <td>Запис у файл:
                <select name="writeFile">
                    <option value="text1.txt">text1.txt</option>
                    <option value="text2.txt">text2.txt</option>
                    <option value="text3.txt">text3.txt</option>
                </select>
                <input type="text" name="text" placeholder="Введіть текст">
                <input type="submit" name="write" value="Записати">
            </td>
        </tr>
        <tr>
            <td>Очистити файл:
                <select name="clearFile">
                    <option value="text1.txt">text1.txt</option>
                    <option value="text2.txt">text2.txt</option>
                    <option value="text3.txt">text3.txt</option>
                </select>
                <input type="submit" name="clear" value="Очистити">
            </td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['read'])) {
        $file = $_POST['readFile'];
        echo "<h3>$file</h3><pre>" . Text::readFromFile($file) . "</pre>";
    } elseif (isset($_POST['write'])) {
        $file = $_POST['writeFile'];
        $text = $_POST['text'];
        Text::writeToFile($file, $text);
        echo "<p>Текст записано в $file</p>";
    } elseif (isset($_POST['clear'])) {
        $file = $_POST['clearFile'];
        Text::clearFile($file);
        echo "<p>Файл $file очищено</p>";
    }
}
?>
</body>
</html>
