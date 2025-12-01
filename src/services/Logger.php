<?php

namespace services;
class Logger
{
    private string $file;

    public function __construct(string $path)
    {
        $this->file = $path;
    }

    public function log(string $message): void
    {
        file_put_contents(
            $this->file,
            "[" . date('Y-m-d H:i:s') . "] " . $message . PHP_EOL,
            FILE_APPEND
        );
    }
}
