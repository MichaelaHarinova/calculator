<?php

declare(strict_types=1);

class Connection
{
    private const HOST = "localhost";
    private string $user = "becode";
    private string $pwd = "Afje6WRh*";
    private string $dbName = "calculator";

    public function openConnection() : PDO
    {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}