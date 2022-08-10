<?php
    namespace Core;
    class Init {
        #定义路径常量
        private static function initConst(){
            define('DS',DIRECTORY_SEPARATOR);#定义目录分隔符
            define('ROOT_PATH',getcwd().DS);#定义根目录
            define('APP_PATH',ROOT_PATH.'Application'.DS);#application目录
            define('CONFIG_PATH',APP_PATH.'Config'.DS);
            define('CONTROLLER_PATH',APP_PATH.'Controller'.DS);
            define('MODEL_PATH',APP_PATH.'Model'.DS);
            define('VIEW_PATH',APP_PATH.'View'.DS);
            define('FRAMEWORK_PATH',ROOT_PATH.'Framework'.DS);
            define('CORE_PATH',FRAMEWORK_PATH.'Core'.DS);
            define('LIB_PATH',FRAMEWORK_PATH.'Lib'.DS);
            define('PUBLIC_PATH',ROOT_PATH.'Public'.DS);
            define('TRAITS_PATH',ROOT_PATH.'Traits'.DS);
        }
        #引入配置文件
        private static function initConfig(){
            $GLOBALS['config'] = require CONFIG_PATH.'config.php';
        }
        #确定路由
        private static function initRoutes(){
            $p = ucfirst(strtolower($_GET['p']??$GLOBALS['config']['app']['dp']));
            $c = ucfirst(strtolower($_GET['c']));#控制器名称(首字母大写)
            $a = strtolower($_GET['a']);#方法名称(小写)
            define('PLATFORM_NAME',$p);#平台名常量
            define('CONTROLLER_NAME',$c);#控制器常量
            define('ACTION_NAME',$a);#方法名常量
            define('__URL__',CONTROLLER_PATH.$p.DS);#当前请求控制器的地址
            define('__VIEW__',VIEW_PATH.$p.DS);#当前视图的目录地址
        }
        private static function class_split($class){
            return array(join('\\',explode('\\',$class,-1)),array_pop(explode('\\',$class)));
        }
        #自动加载类
        private static function initAutoLoad(){
            spl_autoload_register(function($class){
                $res = self::class_split($class);
                $namespace = $res[0];#得到命名空间
                $class_name = $res[1];#得到类名
                // echo $namespace,' 885<br>';
                // echo $class_name,' 886<br>';
                if(in_array($namespace,array('Core','Lib')))#命名空间在core,lib下
                    $path = FRAMEWORK_PATH.$namespace.DS.$class_name.'.class.php';
                elseif($namespace=='Model'){
                    $path = MODEL_PATH.$class_name.'.class.php';
                }elseif($namespace=='Traits')
                    $path = TRAITS_PATH.$class_name.'.class.php';
                else
                    $path = CONTROLLER_PATH.PLATFORM_NAME.DS.$class_name.'.class.php';
                if(file_exists($path)&&is_file($path))
                    require $path;
            });
        }
        private static function redirect(){
            new \Lib\Session;
            if($_SESSION['user']) header('location:index.php?c='.$GLOBALS['config']['login']['dc'].'&a='.$GLOBALS['config']['login']['da']);
            else {
                if($_COOKIE['id']&&$_COOKIE['uname']){
                    $_SESSION['user'] = array('id'=>$_COOKIE['id'],'uname'=>$_COOKIE['uname']);
                    header('location:index.php?c='.$GLOBALS['config']['login']['dc'].'&a='.$GLOBALS['config']['login']['da']);
                }else header('location:index.php?c='.$GLOBALS['config']['app']['dc'].'&a='.$GLOBALS['config']['app']['da']);
            }
        }
        #请求分发
        private static function initDispatch(){
            if(!(CONTROLLER_NAME&&ACTION_NAME)) self::redirect();
            $controller_name = '\Controller\\'.PLATFORM_NAME.'\\'.CONTROLLER_NAME.'Controller';
            $action_name = ACTION_NAME.'Action';
            // echo $controller_name,' 888<br>';
            // echo $action_name, ' 889<br>';
            $controller = new $controller_name();
            $controller->$action_name();
        }
        public static function run(){
            self::initConst();
            self::initConfig();
            self::initRoutes();
            self::initAutoLoad();
            self::initDispatch();
        }
    }
