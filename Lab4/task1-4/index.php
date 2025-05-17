<?php
require_once 'autoload.php';

use Models\PersonModel;
use Controllers\PersonController;
use Views\PersonView;

$model = new PersonModel("Hello from!");
$controller = new PersonController($model);
$view = new PersonView();

$output = $controller->process();
$view->render($output);
