<?php
namespace Views;

/**
 * Class PersonView
 * Представлення для виводу інформації
 */
class PersonView {
    public function render(string $content): void {
        echo "<h3>Вивід з View:</h3>";
        echo "<p>$content</p>";
    }
}
