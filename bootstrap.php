<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function autoload($class)
{
    if (substr($class, 0, 14) === "Minimo\\Models\\")  // Namespace
        $class = substr($class, 14);
    
    if (file_exists('models/'.$class . '.php')) require 'models/'.$class . '.php';
}
spl_autoload_register('autoload'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instancie une classe non déclarée.
