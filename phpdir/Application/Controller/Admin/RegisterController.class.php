<?php
    namespace Controller\Admin;
    class RegisterController extends \Core\Controller{
        private $model;
        public function __construct(){
            self::memoryClear();
        }
        public function loadAction(){
            require __VIEW__.'register.html';
        }
        public function registerAction(){
            if($_POST){
                $this->model = new \Model\RegisterModel;
                echo $this->model->register(array('uname'=>$_POST['uname'],'address'=>$_POST['address'],'upwd'=>$_POST['upwd']));
            }else self::redirect();
        }
    }
