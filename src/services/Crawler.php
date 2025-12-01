<?php
namespace services;

use models\Product;

class Crawler
{
    private array $urls;
    private Fetcher $fetcher;
    private Parser $parser;
    private Logger $logger;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->fetcher = new Fetcher();
        $this->parser = new Parser();
        $this->logger = new Logger(__DIR__ . '/../log.txt');
    }

    public function run(): void
    {
        foreach ($this->urls as $url) {
            try {
                echo "Fetching: $url\n";

                $html = $this->fetcher->fetch($url);

                if (!$html) {
                    echo "Retrying...\n";
                    $html = $this->fetcher->fetch($url);

                    if (!$html) {
                        $this->logger->log("Failed to fetch: $url");
                        continue;
                    }
                }

                $data = $this->parser->parse($html);

                if (!$data) {
                    $this->logger->log("Missing fields in $url: " . json_encode($data));
                }

                $product = new Product($data);
                $product->save();

            } catch (Throwable $e) {
                $this->logger->log("Exception on $url: " . $e->getMessage());
            }
        }
    }
}
