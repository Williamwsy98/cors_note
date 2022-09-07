<?php
    namespace Core;
    class Controller {
        public function __construct(){
            self::InitSession();
        } 
        public static function InitSession(){
            new \Lib\Session;
        }
        // public static function guard(){
        //     if(!$_SESSION['user']) header('location:index.php?c=login&a=load');
        // }
        public static function memoryClear(){
            session_destroy();
            setcookie('id','');
            setcookie('uname','');
        }
        // public static function redirect(){
        //     header($_SESSION['user']?'location:index.php?c=notes&a=lobby':'location:index.php?c=login&a=load');
        // }
        // public static function test(){
        //     echo '666<br>';
        // }
    }
