<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Con_model extends CI_Model
{
    public function post_apply($company,$time,$user_name,$money,$user_id,$st,$status,$con_img){
        $data = array(
            'con_company' => $company,
            'con_date' => $time,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'con_money' => $money,
            'con_img' => $con_img,
            'status' => $status,
            'con_st' => $st
        );
        $result = $this->db->insert('con', $data);
        return $result;
    }
    public function get_all(){
        $sql = 'select * from con where con.status=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function pass_apply($con_id,$status){
        $sql = 'update con set status='.$status.' where con_id='.$con_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($user_id){
        $sql = 'select * from con where con.user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_by_status(){
        $sql = 'select * from con where con.status!=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function return_apply($con_id,$status){
        $sql = 'update con set status='.$status.' where con_id='.$con_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_count(){
        $sql = 'select count(*) as num from con where con.status=0';
        $query = $this->db->query($sql);
        return $query->row();
    }
}
?>