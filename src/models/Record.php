<?php
namespace models;

use \core\Database;

class Record
{
    public \PDO $pdo;

    public function __construct()
    {
        $db = new Database(__DIR__ . '/../../tgn_crawler.sqlite');
        $this->pdo = $db->getConnection();
    }
}