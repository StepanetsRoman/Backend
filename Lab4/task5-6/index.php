<?php
require_once 'classes/Circle.php';

$circle1 = new Circle(2, 5, 1);
$circle2 = new Circle(3, 5, 1);

if ($circle1->intersects($circle2)) {
    echo "Кола перетинаються";
} else {
    echo "Кола не перетинаються";
}
?>
