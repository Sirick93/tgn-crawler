<?php

namespace core;
class Database
{
    private \PDO $pdo;

    public function __construct(string $path)
    {
        $this->pdo = new \PDO("sqlite:" . $path);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): \PDO
    {
        return $this->pdo;
    }
}
