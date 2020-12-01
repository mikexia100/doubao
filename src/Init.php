<?php
namespace DouBao;

use DouBao\Qq\Application as QqIns;
class Init{
    /**
     * @param string $name
     * @param array  $config
     * @return mixed
     */
    public static function make($name, array $config){
        switch ($name){
            case 'Qq':
                return new QqIns($config);
                break;
        }
    }
    /**
     * application instance.
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments){
        return self::make($name, ...$arguments);
    }
}