<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fd_model extends CI_Model
{
    public function post_apply($reason,$time,$user,$money,$details,$user_id,$st,$status){
        $data = array(
            'fd_reason' => $reason,
            'fd_date' => $time,
            'user_name' => $user,
            'fd_money' => $money,
            'fd_details' => $details,
            'user_id' => $user_id,
            'fd_st' => $st,
            'status' => $status
        );
        $result = $this->db->insert('fd', $data);
        return $result;
    }
    public function get_all(){
        $sql = 'select * from fd where fd.status=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function pass_apply($fd_id,$status){
        $sql = 'update fd set status='.$status.' where fd_id='.$fd_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($user_id){
        $sql = 'select * from fd where fd.user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_by_status(){
        $sql = 'select * from fd where fd.status!=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function return_apply($fd_id,$status){
        $sql = 'update fd set status='.$status.' where fd_id='.$fd_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_count(){
        $sql = 'select count(*) as num from fd where fd.status=0';
        $query = $this->db->query($sql);
        return $query->row();
    }
}
?>