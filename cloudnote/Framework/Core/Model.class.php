<?php
    namespace Core;  
    class Model {
        protected $db;
        protected $lib;
        public function __construct(){
            $this->init();
        }
        private function init(){
            $this->db = new MYPDO;
            $this->lib = SQL::getInstance();
        }
        public static function init_config(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
    }