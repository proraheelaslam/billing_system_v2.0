<?php
namespace App\Library\Services;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use \Monolog\Formatter\LineFormatter;
  
class CustomLogs
{
    public function customLogsFunction()
    {
      $dateFormat = "[Y-n-j, g:i a]";
      $output = "%datetime% > %level_name% > %message% %context% %extra%\n";
      $formatter = new LineFormatter(null, null, $output, $dateFormat);
      // Create a handler
      $stream = new StreamHandler(storage_path('categories_logs\editCategorylogs.log'), Logger::INFO);
      $stream->setFormatter($formatter);
      // bind it to a logger object
      $securityLogger = new Logger('security');
      $securityLogger->pushHandler($stream);
      return $securityLogger;
    }
}