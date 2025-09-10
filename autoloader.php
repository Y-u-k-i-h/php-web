<?php

spl_autoload_register(function ($className) {
    $correctClassPath = str_replace("\\", "/", $className);
    $classFilePath = __DIR__ . "/classes/" . $correctClassPath . ".php";
    
    if(file_exists($classFilePath)) {
        require_once $classFilePath;
    } else {
        echo "Class not found: " . $className . " at path: " . $classFilePath;
    }
});