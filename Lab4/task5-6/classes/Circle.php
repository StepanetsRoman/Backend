<?php

/**
 * Class Circle
 * Представляє коло з координатами центру і радіусом
 */
class Circle {
    private float $x;
    private float $y;
    private float $radius;

    public function __construct(float $x, float $y, float $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setX(float $x): void {
        $this->x = $x;
    }

    public function setY(float $y): void {
        $this->y = $y;
    }

    public function setRadius(float $radius): void {
        $this->radius = $radius;
    }

    public function __toString(): string {
        return "Коло з центром в ({$this->x}, {$this->y}) і радіусом {$this->radius}";
    }

    public function intersects(Circle $other): bool {
        $dx = $this->x - $other->getX();
        $dy = $this->y - $other->getY();
        $distance = sqrt($dx ** 2 + $dy ** 2);
        return $distance < ($this->radius + $other->getRadius());
    }
}
