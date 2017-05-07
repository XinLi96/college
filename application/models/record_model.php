<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Record_model extends CI_Model
{
    public function post_apply($title,$time,$details,$user_id,$st,$status){
        $data = array(
            'record_title' => $title,
            'record_con' => $details,
            'record_date' => $time,
            'record_st' => $st,
            'user_id' => $user_id,
            'status' => $status
        );
        $result = $this->db->insert('record', $data);
        return $result;
    }
    public function get_all(){
        $sql = 'select * from record where record.status=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function pass_apply($record_id,$status){
        $sql = 'update record set status='.$status.' where record_id='.$record_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($user_id){
        $sql = 'select * from record where record.user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_by_status(){
        $sql = 'select * from record where record.status!=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function return_apply($record_id,$status){
        $sql = 'update record set status='.$status.' where record_id='.$record_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_count(){
        $sql = 'select count(*) as num from record where record.status=0';
        $query = $this->db->query($sql);
        return $query->row();
    }
}
?>