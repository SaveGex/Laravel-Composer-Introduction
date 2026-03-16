<?php

namespace App\Services;

class LoggerService
{
    private string $logPath;
    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    public function info(string $message): void
    {
        $this->log('info', $message);
    }

    public function error(string $message): void
    {
        $this->log('error', $message);
    }

    private function log(string $level, string $message): void
    {
        $formatted = sprintf(
            "[%s] %s: %s\n",
            date('Y-m-d H:i:s'),
            $level,
            $message
        );

        file_put_contents($this->logPath, $formatted, FILE_APPEND);
    }
}
