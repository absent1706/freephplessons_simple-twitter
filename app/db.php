<?php

const DB_USER          =  'root';
const DB_PASSWORD      =  '';
const DB_DATABASE_NAME =  'simple_twitter';

function db() {
    static $pdo; // статическая переменная не исчезает после завершения выполнения функции
    if (!$pdo)
    {
        try
        {
            $pdo = new \PDO('mysql:host=localhost;dbname=' . DB_DATABASE_NAME, DB_USER,DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $pdo;
        }
        catch(Exception $e)
        {
            die('Cannot connect to DB: ' . $e->getMessage());
        }
    }

    return $pdo;
}
