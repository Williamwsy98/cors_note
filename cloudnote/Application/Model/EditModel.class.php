<?php
    namespace Model;
    class EditModel extends \Core\Model {
        private $uid;
        private $nid;
        private $sql;
        private $note;
        private $img_list;
        private $file_list;
        private function get_note(){
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_notes','wh'=>array('id'=>$this->nid,'user_id'=>$this->uid,'isactive'=>1)));
            $this->note = $this->db->fetch_row($this->sql);
        }
        private function get_img(){
            $this->sql = $this->lib->select_sql(array('table'=>'note_img','wh'=>array('note_id'=>$this->nid,'isactive'=>1)));
            $this->img_list = $this->db->fetch_all($this->sql);
        }
        private function get_file(){
            $this->sql = $this->lib->select_sql(array('table'=>'note_file','wh'=>array('note_id'=>$this->nid,'isactive'=>1)));
            $this->file_list = $this->db->fetch_all($this->sql);
        }
        public function output($uid,$nid){
            $this->uid = $uid;
            $this->nid = $nid;
            $this->get_note();
            if(!$this->note) return false;
            $this->get_img();
            $this->get_file();
            return array('note'=>$this->note,'img_list'=>$this->img_list,'file_list'=>$this->file_list);
        }
    }