<?php

namespace Minimo\Models;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=minimo;charset=utf8', 'root', '');
        return $db;
    }
}