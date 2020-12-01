<?php
namespace DouBao\common;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RedisHandler;
use Monolog\Handler\MongoDBHandler;
use Monolog\Handler\ElasticSearchHandler;

class Log{
    private $logIns = null;
    private $logInsMap = [];
    private $handlerMap = [];
    public function init($name,$handler='stream',$arguments=[]){
        if(!in_array($name,$this->logInsMap)){
            switch($handler){
                case 'stream':
                    if(!in_array($handler,$this->handlerMap)){
                        $this->logInsMap[$handler] = new StreamHandler($arguments['logUrl'], Logger::ERROR);
                    }
                    break;
                case 'redis':
                    if(!in_array($handler,$this->handlerMap)){
                        $this->logInsMap[$handler] = new RedisHandler();
                    }
                    break;
                case 'mongo':
                    if(!in_array($handler,$this->handlerMap)){
                        $this->logInsMap[$handler] = new MongoDBHandler();
                    }
                    break;
                case 'elastic':
                    if(!in_array($handler,$this->handlerMap)){
                        $this->logInsMap[$handler] = new ElasticSearchHandler();
                    }
                    break;
            }
            $this->logInsMap[$name] = new Logger($name);
            $this->logIns->pushHandler($this->logInsMap[$handler]);
        }
        $this->logIns = $this->logInsMap[$name];
    }

    public function doLog($arguments=[]){
        $this->logIns->addInfo($arguments['title'],$arguments['data']);
    }
}

