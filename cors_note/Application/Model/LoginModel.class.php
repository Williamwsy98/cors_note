<?php
    namespace Model;
    class LoginModel extends \Core\Model {
        private $sql;
        private $info;
        public function verify($param){
//	    echo 'verify<br>';
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_users','wh'=>array('uname'=>$param['uname'])));
            $this->info = $this->db->fetch_row($this->sql);
            if($this->info){
                $mpwd = md5($param['upwd']);
                if($mpwd==$this->info['upwd']){
                    if($this->info['isactive']){
                        if($param['is_memory']){
                            setcookie('id',$this->info['id']);
                            setcookie('uname',$this->info['uname']);
                        }
                        $_SESSION['user'] = array('id'=>$this->info['id'],'uname'=>$this->info['uname']);
                        return ['occasion'=>3,'info'=>['id'=>$this->info['id'],'uname'=>$this->info['uname']]];
                    }
                }
                else
                    return ['occasion'=>1];
            }else
                return ['occasion'=>0];
        }
    }
