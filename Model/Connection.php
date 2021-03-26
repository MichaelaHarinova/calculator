<?php

declare(strict_types=1);

class Connection
{
    private const HOST = "";
    private string $user = "";
    private string $pwd = "";
    private string $dbName = "";

    public function openConnection() : PDO
    {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}