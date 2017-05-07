<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Active extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('active_model');
    }
    public function post_apply(){//发送申请
        $reason = $this->input->post('reason');
        $time = $this->input->post('time');
        $user = $this->input->post('user');
        $room = $this->input->post('room');
        $details = $this->input->post('details');
        $user_id = $this->session->userdata('user_id');
        $st = $this->session->userdata('user_name');
        $status = 0;

        $result = $this->active_model->post_apply($reason,$time,$user,$room,$details,$user_id,$st,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '申请失败';
        }
    }
    public function shenhe(){//查看待审核
        $result = $this->active_model->get_all();
        $arr['result'] = $result;
        $this->load->view('shenhe_ac.php',$arr);
    }
    public function pass_apply(){//通过申请
        $active_id = $this->input->get('active_id');
        $status = 1;
        $result = $this->active_model->pass_apply($active_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '审核失败';
        }
    }
    public function history(){//查看历史申请或已审核
        $user_flag = $this->session->userdata('user_flag');
        $user_id = $this->session->userdata('user_id');

        if($user_flag == 1){
            $result = $this->active_model->get_by_id($user_id);
            $arr['result'] = $result;
            $this->load->view('active_history.php',$arr);
        }else if($user_flag = 4){
            $result = $this->active_model->get_by_status();
            $arr['result'] = $result;
            $this->load->view('active_history.php',$arr);
        }
    }
    public function return_apply(){//退回申请
        $active_id = $this->input->get('active_id');
        $status = 2;

        $result = $this->active_model->return_apply($active_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '退回失败';
        }
    }
}
?>