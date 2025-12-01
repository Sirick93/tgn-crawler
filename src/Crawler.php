<?php

class Crawler
{
    private array $urls;
    private Fetcher $fetcher;
    private Parser $parser;
    private Database $db;
    private Logger $logger;

    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->fetcher = new Fetcher();
        $this->parser = new Parser();
        $this->db = new Database(__DIR__ . '/../products.sqlite');
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

                if (!$data['title'] || !$data['price'] || !$data['availability']) {
                    $this->logger->log("Missing fields in $url: " . json_encode($data));
                }

                $this->db->insertProduct($url, $data);

            } catch (Throwable $e) {
                $this->logger->log("Exception on $url: " . $e->getMessage());
            }
        }
    }
}
