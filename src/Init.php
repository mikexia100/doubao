<?php
    namespace DouBao;

    class init{
        /**
         * @param string $name
         * @param array  $config
         * @return mixed
         */
        public static function make($name, array $config){
            require_once "./{$name}/Application.php";
            return new Application($config);
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