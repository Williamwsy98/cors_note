<?php
    namespace Core;
    #封装PDO类
    class MYPDO {
        private static $instance;#存储单例
        private $type;#数据库类别
        private $host;
        private $port;
        private $dbn;#数据库名
        private $user;
        private $pwd;
        private $pdo;#保存PDO对象
        // private $set;
        public function __construct($param=array()){#阻止外部实例化
            $this->init_config();
            $this->initParam($param);
            $this->initPDO();
            $this->initException();
        }
        // private function __clone(){#阻止外部克隆

        // }
        private function init_config(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
        private function initParam($param){#初始化参数
            $this->type = $param['type']??$GLOBALS['config']['db']['type'];
            $this->host = $param['host']??$GLOBALS['config']['db']['host'];
            $this->port = $param['port']??$GLOBALS['config']['db']['port'];
            $this->dbn = $param['dbn']??$GLOBALS['config']['db']['dbn'];
            $this->user = $param['user']??$GLOBALS['config']['db']['user'];
            $this->pwd = $param['pwd']??$GLOBALS['config']['db']['pwd'];
            $this->set = array(
                'type'=>$this->type,
                'host'=>$this->host,
                'port'=>$this->port,
                'dbn'=>$this->dbn,
                'user'=>$this->user,
                'pwd'=>$this->pwd
            );
        }
        private function initException(){#设置异常模式
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        }
        private function print_err($ex,$sql=''){#显示异常
            if($sql){
                echo 'SQL语句执行失败';
                echo '错误语句：'.$sql.'<br>';
            }
            echo '错误编号：'.$ex->getCode().'<br>';
            echo '错误行号：'.$ex->getLine().'<br>';
            echo '错误文件：'.$ex->getFile().'<br>';
            echo '错误信息：'.$ex->getMessage().'<br>';
            exit;
        }
        private function initPDO(){#初始化PDO对象
            try{
                $dsn = "{$this->type}:host={$this->host};post={$this->port};dbname={$this->dbn};charset=utf8";
//                echo $dsn,$this->user,$this->pwd,'<br>';
                $this->pdo = new \PDO($dsn,$this->user,$this->pwd);
            }catch(\PDOException $ex){
                $this->print_err($ex);
            }
        }
        public function exec($sql){#执行增删改操作
            try{
                return $this->pdo->exec($sql);
            }catch(\Exception $ex){
                $this->print_err($ex,$sql);
            }
        }
        public function lastID(){#返回自动增长的编号
            return $this->pdo->lastInsertId();
        }
        private function fetchType($type){#判断匹配类型
            switch($type){
                case 'num':
                    return \PDO::FETCH_NUM;
                case 'both':
                    return \PDO::FETCH_BOTH;
                case 'obj':
                    return \PDO::FETCH_OBJ;
                default:
                    return \PDO::FETCH_ASSOC;
            }
        }
        public function fetch_all($sql,$type='assoc'){#返回二维数组
            try{
                $statement = $this->pdo->query($sql);
                $type = $this->fetchType($type);
                return $statement->fetchAll($type);
            }catch(\Exception $ex){
                $this->print_err($ex,$sql);
            }
        }
        public function fetch_row($sql,$type='assoc'){#返回一维数组
            try{
                $statement = $this->pdo->query($sql);
                $type = $this->fetchType($type);
                return $statement->fetch($type);
            }catch(\Exception $ex){
                $this->print_err($ex,$sql);
            }
        }
        public function fetch_column($sql){#返回一行一列
            try{
                $statement = $this->pdo->query($sql);
                return $statement->fetchColumn();
            }catch(\Exception $ex) {
                $this->print_err($ex,$sql);
            }
        }
        // public static function getInstance($param=array()){#获取单例
        //     if(!self::$instance instanceof self){
        //         self::$instance = new self($param);
        //     }else{
        //         foreach($param as $k=>$v){
        //             if($v&&$v!=self::$set[$k]){
        //                 self::$instance = new self($param);
        //                 break;
        //             }
        //         }
        //     }
        //     return self::$instance;
        // }
    }
