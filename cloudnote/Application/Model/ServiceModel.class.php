<?php
    namespace Model;
    class ServiceModel extends \Core\Model {
        private $res;
        private $sql;
        private $kv;
        private $wh;
        private $f;
        private $index;
        private $front;
        private $back;
        public function add_note($param){
            $this->kv = array('title'=>$param['title'],'content'=>$param['content'],'user_id'=>$param['uid'],'created_time'=>$param['now'],'updated_time'=>$param['now']);
            $this->sql = $this->lib->insert_sql(array('table'=>'cloudnote_notes','kv'=>$this->kv));
            $this->db->exec($this->sql);
        }
        public function edit_note($param){
            $this->kv = array('title'=>$param['title'],'content'=>$param['content'],'updated_time'=>$param['now']);
            $this->sql = $this->lib->update_sql(array('table'=>'cloudnote_notes','kv'=>$this->kv,'wh'=>array('id'=>$param['nid'])));
            $this->db->exec($this->sql);
        }
        public function get_tail(){
            return $this->db->get_tail();
        }
        public function watch($param){
            $nid = $param['nid'];
            $this->sql = $this->lib->select_sql(array('table'=>'cloudnote_notes','wh'=>array('id'=>$nid)));
            $this->res = $this->db->fetch_row($this->sql);
            if($this->res['title']!=$param['title']||$this->res['content']!=$param['content']) return true;
            else if($param['files']) return true;
            else if($param['idel']||$param['fdel']) return true;
            else return false;
        }
        public function if_del($param){
            if($param['idel']){
                foreach($param['idel'] as $id){
                    $this->kv = array('isactive'=>0,'del_time'=>$param['now']);
                    $this->wh = array('id'=>$id);
                    $this->sql = $this->lib->update_sql(array('table'=>'note_img','kv'=>$this->kv,'wh'=>$this->wh));
                    $this->db->exec($this->sql);
                }
            }
            if($param['fdel']){
                foreach($param['fdel'] as $fd){
                    $this->kv = array('isactive'=>0,'del_time'=>$param['now']);
                    $this->wh = array('id'=>$fd);
                    $this->sql = $this->lib->update_sql(array('table'=>'note_file','kv'=>$this->kv,'wh'=>$this->wh));
                    $this->db->exec($this->sql);
                }
            }
        }
        public function upload_file($param){
            $this->f = $param['f'];
            for($i=0;$i<count($this->f['name']);$i++){
                $f_name = $this->f['name'][$i];
                $f_mname = $this->naming($f_name);
                $f_type = $this->f['type'][$i];
                $f_table = strstr($f_type,'image')?'note_img':'note_file';
                $f_src = strstr($f_type,'image')?'images/'.$f_mname:'files/'.$f_mname;
                $f_path = PUBLIC_PATH.$f_src;
                $this->kv = array('src'=>$f_src,'note_id'=>$param['nid'],'name'=>$f_name,'upload_time'=>$param['now'],'del_time'=>$param['now']);
                $this->sql = $this->lib->insert_sql(array('table'=>$f_table,'kv'=>$this->kv));
                move_uploaded_file($this->f['tmp_name'][$i],$f_path);
                $this->db->exec($this->sql);
            }
        }
        private function naming($f_name){
            if(file_exists(PUBLIC_PATH.$f_name))
                return $f_name;
            $this->index = 0;
            $this->front = join('.',explode('.',$f_name,-1));
            $this->back = array_pop(explode('.',$f_name));
            while(true){
                $f_name = $this->index?md5($this->front.$this->index).'.'.$this->back:md5($this->front).'.'.$this->back;
                $this->index++;
                if(!file_exists(PUBLIC_PATH.$f_name))
                    return $f_name;       
            }
        }
        public function note_del($param){
            $this->wh = array('id'=>$param['nid']);
            $this->kv = array('isactive'=>0,'updated_time'=>$param['now']);
            $this->sql = $this->lib->update_sql(array('table'=>'cloudnote_notes','kv'=>$this->kv,'wh'=>$this->wh));
            $this->db->exec($this->sql);
            return true;
        }
    }