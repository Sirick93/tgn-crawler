<?php

class Parser
{
    public function parse(string $html): array
    {
        $dom = str_get_html($html);

        if (!$dom) {
            return [
                'title' => null,
                'price' => null,
                'availability' => null,
            ];
        }

        $title = $dom->find("h1.product-title", 0)->plaintext ?? null;
        $price = $dom->find(".price", 0)->plaintext ?? null;
        $availability = $dom->find(".availability", 0)->plaintext ?? null;

        $dom->clear();

        return [
            'title' => trim($title),
            'price' => trim($price),
            'availability' => trim($availability),
        ];
    }
}
