<?php
    namespace Core;
    class Controller {
        public static function guard(){
            if(!$_SESSION['user']) header('location:index.php?c=login&a=load');
        }
        public static function memoryClear(){
            session_unset();
            setcookie('id','');
            setcookie('uname','');
        }
        public static function redirect(){
            header($_SESSION['user']?'location:index.php?c=notes&a=lobby':'location:index.php?c=login&a=load');
        }
        public static function test(){
            echo '666<br>';
        }
    }
