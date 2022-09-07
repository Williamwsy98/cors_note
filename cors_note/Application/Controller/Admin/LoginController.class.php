<?php
    namespace Controller\Admin;
// use function PHPSTORM_META\type;
    class LoginController extends \Core\Controller{
        private $model;
        private $info;
        public function loadAction(){
            self::memoryClear();
            echo 1;
        }
        public function hasSessionAction(){
            if(!empty($_SESSION['user'])){
                $resp = ['session'=>true,'info'=>['id'=>$_SESSION['user']['id'],'uname'=>$_SESSION['user']['uname']]];
            }else {
                if(!empty($_COOKIE['id'])&&!empty($_COOKIE['uname'])){
                    $_SESSION['user'] = ['id'=>$_COOKIE['id'],'uname'=>$_COOKIE['uname']];
                    $resp = ['session'=>true,'info'=>['id'=>$_COOKIE['id'],'uname'=>$_COOKIE['uname']]];
                }else {
                    $resp = ['session'=>false];
                }
            }
            echo json_encode($resp);
        }
        public function loginAction(){
            $this->model = new \Model\LoginModel;
            $this->info = array('uname'=>$_GET['uname'],'upwd'=>$_GET['upwd'],'is_memory'=>(int)$_GET['is_memory']);
            echo json_encode($this->model->verify($this->info));
        }    
    }
