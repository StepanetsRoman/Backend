<?php
namespace Classes;

require_once 'Human.php';

class Student extends Human {
    protected string $university;
    protected int $course;

    public function __construct(string $name, float $height, float $weight, int $age, string $university, int $course) {
        parent::__construct($name, $height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    protected function onBirthMessage(): string {
        return "Народився студент: {$this->name}";
    }

    public function cleanRoom(): string {
        return "<p>Студент прибирає кімнату</p>";
    }

    public function cleanKitchen(): string {
        return "<p>Студент прибирає кухню</p>";
    }

    public function getInfo(): string {
        return "<p>Ім'я: {$this->name}, ВТк-24-1: {$this->university}, Курс: {$this->course}</p>";
    }
}
