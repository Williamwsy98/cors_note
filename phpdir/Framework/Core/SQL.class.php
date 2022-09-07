<?php
    namespace Core;
    class SQL{
        private static $instance;
        private $sql;
        private $table;
        private $kv;
        private $cols;
        private $wh;
        private $index;
        private $range;
        private $order;
        private $assoc;
        // private $values;
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
            $this->kv = !empty($param['kv']) ? $param['kv'] : '';
            // $this->values = array();
            $this->table = !empty($param['table']) ? $param['table'] : '';
            $this->cols = !empty($param['cols']) ? $param['cols'] : '';
            $this->wh = !empty($param['wh']) ? $param['wh'] : '';
            $this->index = !empty($param['index']) ? $param['index'] : 0;
            $this->range = !empty($param['range']) ? $param['range'] : 0;
            if(!empty($param['order'])){
                if(is_array($param['order'])) $this->order = array('col'=>!empty($param['order']['col'])?$param['order']['col']:'id','td'=>!empty($param['order']['td'])?$param['order']['td']:'asc');
                else $this->order = array('col'=>'id','td'=>$param['order']);
            }
        }
        private function add_qm($param,$assoc){
            if($assoc){
                $keys = array_map(function($k){
                    return "`{$k}`";
                },array_keys($param));
                $keys = join(',',$keys);
                $values = array_map(function($v){
                    return "'{$v}'";
                },array_values($param));
                $values = join(',',$values);
                return array($keys,$values);
            }else {
                $values = array_map(function($v){
                    return "`{$v}`";
                },array_values($param));
                return join(',',$values); 
            }
        }
        public function insert_sql($param){
            $this->init($param);
            $this->kv =$this->add_qm($this->kv,1);
            $this->sql = "insert into `{$this->table}` ".'('.$this->kv[0].') values('.$this->kv[1].')';
            return $this->sql;
        }
        private function format_kv($param,$option){
            if($option=='set'){
                $param = array_map(function($k) use ($param){
                    return "`{$k}`='{$param[$k]}'";
                },array_keys($param));
                $this->sql .= ' set '.join(" , ",$param);
            }elseif($option=='where'){
                $this->sql .= ' where 1';
                foreach($param as $k=>$v){
                    if(is_array($v)){
                        $this->assoc = $v[2]??'and';
                        $v[1] = str_replace("'",'',$v[1]);
                        switch($v[0]){
                            case 'gt':
                                $this->sql .= " {$this->assoc} `$k`>'$v[1]'";
                                break;
                            case 'lt':
                                $this->sql .= " {$this->assoc} `$k`<'$v[1]'";
                                break;
                            case 'ge':
                                $this->sql .= " {$this->assoc} `$k`>='$v[1]'";
                                break;
                            case 'le':
                                $this->sql .= " {$this->assoc} `$k`<='$v[1]'";
                                break;
                            case 'ne':
                                $this->sql .= " {$this->assoc} `$k`!='$v[1]'";
                                break;
                            case 'lk':
                                $this->sql .= " {$this->assoc} `$k` like '$v[1]'";
                                break;
                            default:
                                $this->sql .= " {$this->assoc} `$k`='$v[1]'";
                        }
                    }else {
                        $v = str_replace("'",'',$v);
                        $this->sql .= " and `$k`='$v'";
                    }
                }
            }
        }
        // private function where_sql(){
        //     $kv = $this->wh;
        //     $this->wh = array_map(function($k) use ($kv){
        //         return "`{$k}`='{$kv[$k]}'";
        //     },array_keys($this->wh));
        //     $this->sql = $this->sql.' where '.join(' and ',$this->wh);
        // }
        public function update_sql($param){
            $this->init($param);
            $this->sql = "update `{$this->table}`";
            $this->format_kv($this->kv,'set');
            if($this->wh) $this->format_kv($this->wh,'where');
            return $this->sql;
        }
        public function select_sql($param){
            $this->init($param);
            if($this->cols) $this->cols = $this->add_qm($this->cols,0);
            $this->sql = $this->cols?"select {$this->cols} from `{$this->table}`":"select * from `{$this->table}`";
            if($this->wh) $this->format_kv($this->wh,'where');
            if($this->order) $this->sql = $this->sql.' order by '.$this->order['col'].' '.$this->order['td'];
            if($this->range) $this->sql = $this->sql.' limit '.$this->index.','.$this->range;
            return $this->sql;
        }
        public function count_sql($param){
            $this->init($param);
            $this->sql = "select count(*) from `{$this->table}`";
            if($this->wh) $this->format_kv($this->wh,'where');
            if($this->order) $this->sql = $this->sql.' order by '.$this->order['col'].' '.$this->order['td'];
            if($this->range) $this->sql = $this->sql.' limit '.$this->index.','.$this->range;
            return $this->sql;
        }
        public function del_sql($param){
            $this->init($param);
            $this->sql = "delete from `{$this->table}`";
            if($this->wh) $this->format_kv($this->wh,'where');
            if($this->order) $this->sql = $this->sql.' order by '.$this->order['col'].' '.$this->order['td'];
            if($this->range) $this->sql = $this->sql.' limit '.$this->index.','.$this->range;
            return $this->sql;
        }
    }