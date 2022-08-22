<?php
    namespace Model;
    class NotesModel extends \Core\Model {
        private $sql;
        private $sum;
        private $index;
        public function get_count($uid){
            self::init_config();
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_notes','wh'=>array('user_id'=>$uid,'isactive'=>1),'cols'=>array('count(*)')));
            $this->sum = $this->db->fetch_column($this->sql);
            return ceil($this->sum/$GLOBALS['config']['pagesize']);
        } 
        public function output($uid,$pageno){
            $this->index = ($pageno-1)*$GLOBALS['config']['pagesize'];
            // echo $this->index,' 998<br>';
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_notes','wh'=>array('user_id'=>$uid,'isactive'=>1),'index'=>$this->index,'range'=>$GLOBALS['config']['pagesize']));
            return $this->db->fetch_all($this->sql);
        }
    }
