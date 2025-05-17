<?php
class Student extends Human {
    private string $university;
    private int $course;

    public function __construct(string $name, float $height, float $weight, int $age, string $university, int $course) {
        parent::__construct($name, $height, $weight, $age);
        $this->name = $name;
        $this->university = $university;
        $this->course = $course;
    }

    public function promote(): void {
        $this->course++;
    }

    public function getInfo(): string {
        return "<p>Ім'я: {$this->name} | ВТк-24-1: {$this->university} | Курс: {$this->course}</p>";
    }
}
