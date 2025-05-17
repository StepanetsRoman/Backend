<?php
spl_autoload_register(function ($class) {
    $path = "classes/" . $class . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
});

$programmer = new Programmer("Oleksander", 180, 90, 19, ["C#", "C++", "PHP"], 3);
$student = new Student("Roman", 160, 80, 21, "Zhytomyr Polytechnic", 2);

echo "<h3>Програміст:</h3>";
echo $programmer->getInfo();
$programmer->addLanguage("Python");
echo $programmer->getInfo();

echo "<h3>Студент:</h3>";
echo $student->getInfo();
$student->setHeight(165);
echo $student->getInfo();
