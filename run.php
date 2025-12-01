<?php

require_once __DIR__ . '/simple_html_dom.php';
require_once __DIR__ . '/src/Fetcher.php';
require_once __DIR__ . '/src/Parser.php';
require_once __DIR__ . '/src/Database.php';
require_once __DIR__ . '/src/Logger.php';
require_once __DIR__ . '/src/Crawler.php';

$urls = [
    "https://example.com/product1",
    "https://example.com/product2",
];

$crawler = new Crawler($urls);
$crawler->run();

echo "Done. Check products.sqlite and log.txt.\n";
