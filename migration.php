<?php
$db = new PDO('sqlite:tgn_crawler.db');

$query = "CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    availability TINYINT NOT NULL DEFAULT 0,
    created_at INTEGER NOT NULL
    )";

$db->query($query);