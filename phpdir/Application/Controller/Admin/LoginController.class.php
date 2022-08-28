<?php
    namespace Controller\Admin;
// use function PHPSTORM_META\type;
    class LoginController extends \Core\Controller{
        private $model;
        private $info;
        public function loadAction(){
            self::memoryClear();
            require __VIEW__.'login.html';
        }
        public function loginAction(){
            $this->model = new \Model\LoginModel;
//	    echo 'loginAction<br>';
            $this->info = array('uname'=>$_GET['uname'],'upwd'=>$_GET['upwd'],'is_memory'=>(int)$_GET['is_memory']);
            echo $this->model->verify($this->info);
        }    
    }
