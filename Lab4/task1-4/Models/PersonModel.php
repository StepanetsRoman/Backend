<?php
namespace Models;

/**
 * Class PersonModel
 * Модель для роботи з особистими даними користувача
 */
class PersonModel {
    private string $name;

    public function __construct(string $name = "Невідомий") {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }
}
