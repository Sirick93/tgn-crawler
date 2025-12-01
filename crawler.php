<?php
require_once "simple_html_dom.php";

// get products list from e-shop
$html =  file_get_html('https://www.e-shop.gr/ypologistes-koutia-cases-list?table=PER&category=%CA%CF%D5%D4%C9%C1+-+CASES');

foreach($html->find('.web-product-container') as $element) {
    echo $element->innertext;
}