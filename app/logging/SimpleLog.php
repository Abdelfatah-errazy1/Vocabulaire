<?php 
namespace App\logging;
use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;
class SimpleLog{
  public function __invoke($logger){
    foreach($logger->getHandlers() as $handler){
      $handler->setFormatter(new LineFormatter(
        '[%datetime%] %channel%.%level_name%: %message% %context% %extra%'
    ));
    }
  }
}