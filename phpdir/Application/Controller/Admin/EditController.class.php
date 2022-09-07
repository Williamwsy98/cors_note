<?php
    namespace Controller\Admin;
    class EditController extends \Core\Controller{
        private $model;
        private $res;
        public function renderAction(){
            self::guard();
            if(!empty($_GET['nid'])){
                $this->model = new \Model\EditModel;
                $nid = $_GET['nid'];
                $this->res = $this->model->output($_SESSION['user']['id'],$_GET['nid']);
                $note = $this->res['note'];
                $img_list = $this->res['img_list'];
                $file_list = $this->res['file_list'];
            }
            require __VIEW__.'edit_note.html';
        }
    }
