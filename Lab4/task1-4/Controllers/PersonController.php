<?php
namespace Controllers;

use Models\PersonModel;

/**
 * Class PersonController
 * Контролер для обробки логіки користувача
 */
class PersonController {
    private PersonModel $model;

    public function __construct(PersonModel $model) {
        $this->model = $model;
    }

    public function process(): string {
        return "Ім'я з контролера: " . $this->model->getName();
    }
}
