<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notice_model extends CI_Model
{
    public function post($title,$time,$con){
        $data = array(
            'notice_title' => $title,
            'notice_time' => $time,
            'notice_con' => $con
        );
        $result = $this->db->insert('notice', $data);
        return $result;
    }
    public function get_all(){
        $sql = 'select * from notice';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_one(){
        $sql = 'select * from notice ORDER BY notice_id DESC LIMIT 1';
        $query = $this->db->query($sql);
        return $query->row();
    }
    public function del_id($notice_id){
        $sql = 'delete from notice where notice.notice_id='.$notice_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
}
?>