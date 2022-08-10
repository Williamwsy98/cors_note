<?php
    namespace Core;
    class MYSQLDB {
        private static $instance;#用于保存当前单例
        private $host;#用于存储数据库参数
        private $user;
        private $pwd;
        private $dbn;
        private $link;#用于存储连接对象
        private $set;
        private function __construct($param){#构造函数，用于阻止外部实例化
            $this->init_config();
            $this->init_params($param);
            $this->db_connect();
        }
        private function __clone(){#克隆函数，用于阻止外部克隆

        }
        private function init_config(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
        private function init_params($param){#初始化数据库参数
            $this->host = $param['host']??$GLOBALS['config']['db']['host'];#获取数据库参数(参数最终需要写在配置文件里)
            $this->user = $param['user']??$GLOBALS['config']['db']['user'];
            $this->pwd = $param['pwd']??$GLOBALS['config']['db']['pwd'];
            $this->dbn = $param['dbn']??$GLOBALS['config']['db']['dbn'];
            $this->set = array('host'=>$this->host,'user'=>$this->user,'pwd'=>$this->pwd,'dbn'=>$this->dbn);
        }
        private function db_connect(){#连接数据库
            $this->link = mysqli_connect($this->host,$this->user,$this->pwd,$this->dbn);
            if(mysqli_connect_error()){#出现连接错误时返回错误信息并中止
                echo 'failed to connect to database','<br>';
                echo 'error information:'.mysqli_connect_error(),'<br>';
                echo 'error code:'.mysqli_connect_errno(),'<br>';
                exit;
            }
        }
        public static function getInstance($param=array()){#用于获取当前单例
            if(!self::$instance instanceof self){#判断是否为MYSQLDB类型 
                self::$instance = new self($param);
            }else{
                foreach($param as $k=>$v){
                    if($v&&$v!=self::$set[$k]){
                        self::$instance = new self($param);
                        break;
                    }
                }
            }
            return self::$instance;
        }
        private function exec($sql){#执行数据库语句
            if(!$result = mysqli_query($this->link,$sql)){#获取执行结果并判断是否执行成功
                echo 'failed to execute';#返回错误信息并中止
                echo 'error information:'.mysqli_error($this->link),'<br>';
                echo 'error code:'.mysqli_errno($this->link),'<br>';
                echo 'error line:'.$sql,'<br>';
                exit;
            }
            return $result;#返回执行结果
        }
        public function exec_cud($sql){#执行增删改语句
            $key = substr($sql,0,6);#截取语句关键词
            if(in_array($key,array('insert','update','delete')))#判断是否为增删改语句
                return $this->exec($sql);#返回布尔值，表示是否执行成功
            else{
                echo 'ilegal statement','<br>';
                exit;
            }
        }
        private function exec_r($sql){#执行查询语句
            if(substr($sql,0,6)=='select'||in_array(substr($sql,0,4),array('show','desc'))){#判断是否为查询语句
                return $this->exec($sql);#返回结果
            }else{
                echo 'ilegal statement','<br>';
                exit;
            }
        }
        private function get_type($type){#返回匹配数据类型
            switch($type){
                case 'num':
                    return MYSQLI_NUM;
                case 'both':
                    return MYSQLI_BOTH;
                default:
                    return MYSQLI_ASSOC;
            }
        }
        public function fetch_all($sql,$type='assoc'){#执行查询语句并返回二维数组(type为数据类型，默认为assoc)
            $result = $this->exec_r($sql);
            $type = $this->get_type($type);
            return mysqli_fetch_all($result,$type);
        }
        public function fetch_row($sql,$type='assoc'){#执行查询语句并返回一维数组(用于只有单条记录的场合)
            $list = $this->fetch_all($sql,$type);
            if(!empty($list))#判断数组是否为空
                return $list[0];
            return array();
        }
        public function fetch_column($sql){#执行查询语句并返回一行一列
            $list = $this->fetch_row($sql,'num');
            if(!empty($list))
                return $list[0];
            return null;
        }
        public function get_tail(){#获取自动增长的编号
            return mysqli_insert_id($this->link);
        }
    }
