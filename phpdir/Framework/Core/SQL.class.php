<?php
    namespace Core;
    class SQL{
        private static $instance;
        private $sql;
        private $table;
        private $kv;
        private $cols;
        private $wh;
        private $values;
        private $index;
        private $range;
        private function __construct(){
        }
        private function __clone(){

        }
        public static function getInstance(){
            if(!self::$instance instanceof self)
                self::$instance = new self();
            return self::$instance;
        }
        private function init($param){
            $this->sql = '';
            $this->values = array();
            $this->kv = $param['kv'];
            $this->table = $param['table'];
            $this->cols = $param['cols'];
            $this->wh = $param['wh'];
            $this->index = $param['index']??0;
            $this->range = $param['range']??0;
        }
        public function insert_sql($param){
            $this->init($param);
            foreach($this->kv as $v){
                array_push($this->values,"'$v'");
            }
            $this->sql = 'insert into '.$this->table.'('.join(',',array_keys($this->kv)).') values('.join(',',$this->values).')';
            return $this->sql;
        }
        public function update_sql($param){
            $this->init($param);
            $this->sql = 'update '.$this->table.' set ';
            foreach($this->kv as $k=>$v){
                array_push($this->values,"$k='$v'");
            }
            $this->sql = $this->sql.join(',',$this->values);
            if($this->wh){
                $this->values = array();
                foreach($this->wh as $k=>$v){
                    array_push($this->values,"$k='$v'");
                }
                $this->sql = $this->sql.' where '.join(' and ',$this->values);
            }
            return $this->sql;
        }
        public function select_sql($param){
            $this->init($param);
            $this->sql = $this->cols?'select '.join(',',$this->cols).' from '.$this->table:'select * from '.$this->table;
            if($this->wh){
                foreach($this->wh as $k=>$v){
                    array_push($this->values,"$k='$v'");
                }
                $this->sql = $this->sql.' where '.join(' and ',$this->values);
            }
            if($this->range){
                $this->sql = $this->sql.' limit '.$this->index.','.$this->range;
            }
            return $this->sql;
        } 
    }