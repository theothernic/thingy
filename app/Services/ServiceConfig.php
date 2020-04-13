<?php
    namespace App\Services;

    class ServiceConfig
    {
        private $_vars = [
            'token' => null,
            'secret' => null
        ];

        public function __get($name)
        {
            return $this->_vars[$name];
        }

        public function __set($name, $value)
        {
            $this->_vars[$name] = $value;
        }
    }
