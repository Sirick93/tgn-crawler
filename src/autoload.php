<?php
spl_autoload_register(function ($class) {

    // Convert namespace separators to folder separators
    $class = str_replace('\\', '/', $class);

    $path = __DIR__ . '/' . $class . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});