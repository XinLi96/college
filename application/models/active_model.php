<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Active_model extends CI_Model
{
    public function post_apply($reason,$time,$user,$room,$details,$user_id,$st,$status){//发送申请
        $data = array(
            'active_name' => $reason,
            'active_date' => $time,
            'user_name' => $user,
            'active_room' => $room,
            'active_note' => $details,
            'user_id' => $user_id,
            'active_st' => $st,
            'status' => $status
        );
        $result = $this->db->insert('active', $data);
        return $result;
    }
    public function get_all(){//获取所有待审核的申请
        $sql = 'select * from active ac where ac.status=0';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function pass_apply($active_id,$status){//通过申请
        $sql = 'update active set status='.$status.' where active_id='.$active_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_by_id($user_id){//社团查看自己的申请历史
        $sql = 'select * from active where active.user_id='.$user_id.'';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_by_status(){//部门查看自己已处理的申请
        $sql = 'select * from active where active.status!=0';
        $query = $this->db->query($sql);
        return $query->result();//查出多行数据（数组形式）
    }
    public function return_apply($active_id,$status){//退回申请
        $sql = 'update active set status='.$status.' where active_id='.$active_id.'';
        $query = $this->db->query($sql);
        return $query;
    }
    public function get_count(){//主页面显示待审核的数量
        $sql = 'select count(*) as num from active where active.status=0';
        $query = $this->db->query($sql);
        return $query->row();//查出一行数据
    }
}
?>