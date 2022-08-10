<?php
    namespace Model;
    class RegisterModel extends \Core\Model {
        private $sql;
        private $kv;
        public function register($param){
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_users','wh'=>array('uname'=>$param['uname'])));
            if($this->db->fetch_row($this->sql)) return 0;
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_users','wh'=>array('address'=>$param['address'])));
            if($this->db->fetch_row($this->sql)) return 1;
            $this->kv = array('uname'=>$param['uname'],'address'=>$param['address'],'upwd'=>md5($param['upwd']));
            $this->sql = $this->lib->insert_sql(array('table'=>'cloudnote_users','kv'=>$this->kv));
            $this->db->exec($this->sql);
            return 2;
        }
    }