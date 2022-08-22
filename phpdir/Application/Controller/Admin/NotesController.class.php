<?php
    namespace Controller\Admin;

use function PHPSTORM_META\type;

    class NotesController extends \Core\Controller{
        private $model;
        public function __construct(){
            self::guard();
        }
        public function lobbyAction(){
            $uname = $_SESSION['user']['uname'];
            require __VIEW__.'index.html';
        }
        private function isLegal($pageno,$count){
            if(is_numeric($pageno)&&(int)$pageno==$pageno){
                if($pageno>0&&$pageno<=$count) return $pageno;
            }
            return '1';
        }
        public function renderAction(){
            $this->model = new \Model\NotesModel;
            $count = $this->model->get_count($_SESSION['user']['id']);
            $pageno = isset($_GET['pageno'])?$this->isLegal($_GET['pageno'],$count):'1';
            $res = $this->model->output($_SESSION['user']['id'],$pageno);
            require __VIEW__.'mynotes.html';
        }
    }
