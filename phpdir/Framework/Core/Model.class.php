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
//            echo 'in Model.class.php init --db--';
            $this->lib = SQL::getInstance();
//            echo 'in Model.class.php init --lib--';
        }
        public static function init_config(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
    }
