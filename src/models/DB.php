<?php
namespace models;

use \core\Database;

class DB
{
    public \PDO $pdo;

    public function __construct()
    {
        $db = new Database(__DIR__ . '/../../tgn_crawler.db');
        $this->pdo = $db->getConnection();
    }
}