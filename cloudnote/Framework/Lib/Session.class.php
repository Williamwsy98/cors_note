<?php
    #封装session入库
    namespace Lib;
    class Session {
        private $pdo;
        private $lib;
        private $sql;
        public function __construct(){
            session_set_save_handler(
                [$this,'open'],
                [$this,'close'],
                [$this,'read'],
                [$this,'write'],
                [$this,'destroy'],
                [$this,'gc']
            );
            session_start();  
        }
        private function initConfig(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
        public function open(){#打开会话
            $this->initConfig();
            $this->pdo = new \Core\MYPDO(array('dbn'=>$GLOBALS['config']['session_db']));
            $this->lib = \Core\SQL::getInstance();
            return true;
        }
        public function close(){#关闭会话
            return true;
        }
        public function read($sess_id){#读取会话
            $this->sql = $this->lib->select_sql(array('table'=>'sess','cols'=>['sess_value'],'wh'=>array('sess_id'=>$sess_id)));
            // echo "$sess_id<br>"; 
            return (string)$this->pdo->fetch_column($this->sql);
        }
        public function write($sess_id,$sess_value){#写入会话
            $sql = "insert into sess values('$sess_id','$sess_value',unix_timestamp()) on duplicate key update sess_value='$sess_value',sess_time=unix_timestamp()";
            // echo "$sess_value<br>"; 
            return $this->pdo->exec($sql)!==false;
        }
        public function destroy($sess_id){#销毁会话
            $this->sql = $this->lib->del_sql(array('table'=>'sess','wh'=>array('sess_id'=>$sess_id)));
            return $this->pdo->exec($this->sql)!==false;
        }
        public function gc($lifetime){#垃圾回收
            $expires = time()-$lifetime;
            $this->sql = $this->lib->del_sql(array('table'=>'sess','wh'=>array('sess_time'=>['lt',$expires])));
            return $this->pdo->exec($this->sql)!==false;
        }
    }