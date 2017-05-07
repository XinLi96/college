<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    public function get_name_by_pass($user_num,$user_pass){//通过账号密码获取登录用户的信息
        $data=array(
            'user_num'=>$user_num,
            'user_pass'=>$user_pass,
        );
        $query=$this->db->get_where('user',$data);
        return $query->row();
    }
    public function get_by_num_name($user_num,$user_name){//注册时看账号或社团名是否存在
        $sql = 'select * from user u where u.user_num='.$user_num.' or  u.user_name='."'$user_name'".'';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function add_user($user_num,$user_name,$user_pass1,$flag){//添加社团到user表中
        $data = array(
            'user_num' => $user_num,
            'user_name' => $user_name,
            'user_pass' => $user_pass1,
            'user_flag' => $flag
         );
        $result = $this->db->insert('user', $data);
        return $result;
    }
    public function get_st(){
        $sql = 'select * from user where user_flag=1';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function del_st($user_id){
        $sql = 'delete from user where user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($user_id){
        $sql = "select * from user where user_id=".$user_id;
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function change($user_id,$user_pass){
        $sql = 'update user set user_pass='.$user_pass.' where user_id='.$user_id;
        $query = $this->db->query($sql);
        return $query;
    }
}
?>