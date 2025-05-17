<?php
namespace Classes;

require_once 'ICleanHouse.php';

abstract class Human implements ICleanHouse {
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

    public function giveBirth(): string {
        return $this->onBirthMessage();
    }

    abstract protected function onBirthMessage(): string;
}
