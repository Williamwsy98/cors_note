<?php
    namespace Controller\Admin;
    class EditController extends \Core\Controller{
        private $model;
        private $res;
        public function renderAction(){
            // self::guard();
            if(!empty($_GET['nid'])){
                $this->model = new \Model\EditModel;
                $this->res = $this->model->output($_SESSION['user']['id'],$_GET['nid']);
                $note = $this->res['note'];
                $img_list = $this->res['img_list'];
                $file_list = $this->res['file_list'];
                $resp = ['note'=>$note,'images'=>$img_list,'files'=>$file_list];
                echo json_encode($resp);
            }
        }
    }
