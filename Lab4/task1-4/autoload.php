<?php
spl_autoload_register(function ($class) {
    $prefix = '';
    $base_dir = __DIR__ . '/';

    $class = str_replace('\\', '/', $class);
    $file = $base_dir . $class . '.php';
    $file = str_replace('Models/', 'Models/', $file);
    $file = str_replace('Controllers/', 'Controllers/', $file);
    $file = str_replace('Views/', 'Views/', $file);

    if (file_exists($file)) {
        require_once $file;
    }
});
