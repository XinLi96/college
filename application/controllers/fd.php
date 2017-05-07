<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fd extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fd_model');
    }
    public function post_apply(){
        $reason = $this->input->post('reason');
        $time = $this->input->post('time');
        $user = $this->input->post('user');
        $money = $this->input->post('money');
        $details = $this->input->post('details');
        $user_id = $this->session->userdata('user_id');
        $st = $this->session->userdata('user_name');
        $status = 0;

        $result = $this->fd_model->post_apply($reason,$time,$user,$money,$details,$user_id,$st,$status);
        if($result){
            $this->load->view('index.php');
        }else{
            echo '申请失败';
        }
    }
    public function shenhe(){
        $result = $this->fd_model->get_all();
        $arr['result'] = $result;
        $this->load->view('shenhe.php',$arr);
    }
    public function pass_apply(){
        $fd_id = $this->input->get('fd_id');
        $status = 1;
        $result = $this->fd_model->pass_apply($fd_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '审核失败';
        }
    }
    public function history(){
        $user_flag = $this->session->userdata('user_flag');
        $user_id = $this->session->userdata('user_id');

        if($user_flag == 1){
            $result = $this->fd_model->get_by_id($user_id);
            $arr['result'] = $result;
            $this->load->view('money_history.php',$arr);
        }else if($user_flag = 2){
            $result = $this->fd_model->get_by_status();
            $arr['result'] = $result;
            $this->load->view('money_history.php',$arr);
        }
    }
    public function return_apply(){
        $fd_id = $this->input->get('fd_id');
        $status = 2;

        $result = $this->fd_model->return_apply($fd_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '退回失败';
        }
    }
}
?>