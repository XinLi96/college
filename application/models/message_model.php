<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Message_model extends CI_Model
{
    public function post_mess($recieve,$time,$details,$post){
        $data = array(
            'mess_rec' => $recieve,
            'mess_time' => $time,
            'mess_con' => $details,
            'mess_post' => $post
        );
        $result = $this->db->insert('message', $data);
        return $result;
    }
    public function get_all(){
        $sql = 'select * from message';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>