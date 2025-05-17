<?php
namespace Classes;

require_once 'Human.php';

class Programmer extends Human {
    protected array $languages;
    protected int $experience;

    public function __construct(string $name, float $height, float $weight, int $age, array $languages, int $experience) {
        parent::__construct($name, $height, $weight, $age);
        $this->languages = $languages;
        $this->experience = $experience;
    }

    protected function onBirthMessage(): string {
        return "Народився програміст: {$this->name}";
    }

    public function cleanRoom(): string {
        return "<p>Програміст прибирає кімнату</p>";
    }

    public function cleanKitchen(): string {
        return "<p>Програміст прибирає кухню</p>";
    }

    public function getInfo(): string {
        $langs = implode(", ", $this->languages);
        return "<p>Ім'я: {$this->name}, Мови: $langs, Досвід: {$this->experience} років</p>";
    }
}
