<?php
/**
 * Class Human
 * Базовий клас людини
 */
class Human {
    protected string $name;
    protected float $height;
    protected float $weight;
    protected int $age;

    public function __construct(string $name, float $height, float $weight, int $age) {
        $this->name = $name;
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    public function getHeight(): float { return $this->height; }
    public function getWeight(): float { return $this->weight; }
    public function getAge(): int { return $this->age; }

    public function setHeight(float $h): void { $this->height = $h; }
    public function setWeight(float $w): void { $this->weight = $w; }
    public function setAge(int $a): void { $this->age = $a; }

    public function getName(): string { return $this->name; }
}
