<?php
class Programmer extends Human {
    private array $languages;
    private int $experience;

    public function __construct(string $name, float $height, float $weight, int $age, array $languages, int $experience) {
       parent::__construct($name, $height, $weight, $age);
        $this->languages = $languages;
        $this->experience = $experience;
    }

    public function addLanguage(string $lang): void {
        if (!in_array($lang, $this->languages)) {
            $this->languages[] = $lang;
        }
    }

    public function getInfo(): string {
        return "<p>Ім'я: {$this->name} | Вік: {$this->age} | Мови: " . implode(", ", $this->languages) . " | Досвід: {$this->experience} років</p>";
    }
}
