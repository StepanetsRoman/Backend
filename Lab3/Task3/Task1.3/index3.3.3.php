<?php
$filename = "file_sorted.txt";

if (file_exists($filename)) {
    $words = str_word_count(file_get_contents($filename), 1);
    sort($words, SORT_STRING | SORT_FLAG_CASE);
    echo "<h3>Відсортовані слова:</h3><ul>";
    foreach ($words as $word) {
        echo "<li>" . htmlspecialchars($word) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Файл не знайдено.";
}
?>
