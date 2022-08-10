<?php
    namespace Controller\Admin;
    class ServiceController extends \Core\Controller{
        private $model;
        private $uid;
        private $now;
        private $title;
        private $content;
        private $files;
        private $nid;
        private $idel;
        private $fdel;
        public function __construct(){
            parent::__construct();
            self::guard();
            $this->model = new \Model\ServiceModel;
            $this->uid = $_SESSION['user']['id'];
        }
        private function get_time(){
            $this->now = date('Y-m-d H:i:s',time());
        }
        private function config($flag){
            $this->get_time();
            $this->title = $_POST['title'];
            $this->content = $_POST['content'];
            if($_FILES['file']) $this->files = $_FILES['file'];
            if($_POST['nid']) $this->nid = $_POST['nid'];
            if($_POST['idel']) $this->idel = json_decode($_POST['idel']);
            if($_POST['fdel']) $this->fdel = json_decode($_POST['fdel']);
            if($flag) return $this->model->watch(array('nid'=>$this->nid,'title'=>$this->title,'content'=>$this->content,
            'files'=>$this->files,'idel'=>$this->idel,'fdel'=>$this->fdel));
        }
        public function addAction(){
            if($_POST){
                $this->config(0);
                $this->model->add_note(array('title'=>$this->title,'content'=>$this->content,'uid'=>$this->uid,'now'=>$this->now));
                if($this->files){
                    $this->nid = $this->model->get_tail();
                    $this->model->upload_file(array('f'=>$this->files,'nid'=>$this->nid,'now'=>$this->now));
                }
                echo 1;
            }else self::redirect();
        }
        public function editAction(){
            if($_POST){
                if($this->config(1)){
                    $this->model->if_del(array('idel'=>$this->idel,'fdel'=>$this->fdel,'now'=>$this->now));
                    $this->model->edit_note(array('title'=>$this->title,'content'=>$this->content,'now'=>$this->now,'nid'=>$this->nid));
                    if($this->files){
                        $this->model->upload_file(array('f'=>$this->files,'nid'=>$this->nid,'now'=>$this->now));
                    }
                    echo 1;
                }else echo 0;
            }else self::redirect();
        }
        public function delAction(){
            if($_POST){
                $this->nid = $_POST['nid'];
                $this->get_time();
                echo $this->model->note_del(array('nid'=>$this->nid,'now'=>$this->now));
            }else self::redirect();
        }
    }