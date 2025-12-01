<?php
$db = new SQLite3('tgn_crawler.db');

$query = "CREATE TABLE IF NOT EXISTS product (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NOT NULL,
    price INTEGER NOT NULL,
    availability TINYINT NOT NULL DEFAULT 0,
    created_at INTEGER NOT NULL,
    )";

$db->exec($query);