<?php
namespace services;

class Parser
{
    public function parse(string $html)
    {
        $dom = str_get_html($html);

        if (!$dom) {
            return false;
        }

        $title = $dom->find("h1", 0)->plaintext ?? null;
        $price = $dom->find(".web-prices-v2", 0)->plaintext ?? null;
        $availability = $dom->find("#stock_div");

        if ($availability) {
            $availability = 1;
        } else {
            $availability = 0;
        }

        if (!$title || !$price) {
            return false;
        }

        $dom->clear();

        return [
            'title' => trim($title),
            'price' => trim($price),
            'availability' => $availability,
        ];
    }
}
