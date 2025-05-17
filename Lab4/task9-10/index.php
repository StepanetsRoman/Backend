<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $path = __DIR__ . '/classes/' . basename($class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

use Classes\Programmer;
use Classes\Student;

$programmer = new Programmer("Roman", 180, 90, 19, ["C#", "C++", "PHP"], 3);
$student = new Student("Oleksander", 160, 80, 21, "Zhytomyr Polytechnic", 2);

echo "<h3>Програміст:</h3>";
echo $programmer->getInfo();
echo $programmer->cleanKitchen();
echo $programmer->cleanRoom();

echo "<h3>Студент:</h3>";
echo $student->getInfo();
echo $student->cleanKitchen();
echo $student->cleanRoom();
