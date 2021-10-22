<?php

class DatabaseManager
{
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function connect()
    {
    }
}

$firstInstance = DatabaseManager::getInstance();
$secondInstance = DatabaseManager::getInstance();

if ($firstInstance === $secondInstance) {
    echo "C'est la meme instance !";
}
