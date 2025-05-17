<?php

/**
 * Class Text
 * Статичний клас для роботи з текстовими файлами у папці "text"
 */
class Text {
    public static string $dir = "text";

    public static function writeToFile(string $filename, string $text): void {
        $path = self::$dir . "/" . $filename;
        file_put_contents($path, $text . PHP_EOL, FILE_APPEND);
    }

    public static function readFromFile(string $filename): string {
        $path = self::$dir . "/" . $filename;
        return file_exists($path) ? file_get_contents($path) : "Файл не знайдено.";
    }

    public static function clearFile(string $filename): void {
        $path = self::$dir . "/" . $filename;
        file_put_contents($path, "");
    }
}
