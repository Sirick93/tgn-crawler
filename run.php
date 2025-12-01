<?php
require_once __DIR__ . '/src/autoload.php';
require_once 'simple_html_dom.php';

use services\Crawler;

$urls = [];
// get products list from e-shop
$html =  file_get_html('https://www.e-shop.gr/ypologistes-koutia-cases-list?table=PER&category=%CA%CF%D5%D4%C9%C1+-+CASES');

foreach($html->find('.web-product-title a') as $productLink) {
    $urls[] = $productLink->href;
}

$crawler = new Crawler($urls);
$crawler->run();

echo "Done. Check products.sqlite and log.txt.\n";
