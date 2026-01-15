<?php

session_start();
spl_autoload_register(function ($class) {
    $basePath = __DIR__;

    $paths = [
        $basePath . '/Controller/' . $class . '.php',
        $basePath . '/Models/' . $class . '.php',
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

require_once __DIR__ . '/../config/database.php';
