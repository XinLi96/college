<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Record extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('record_model');
    }
    public function post_apply(){
        $title = $this->input->post('title');
        $time = $this->input->post('time');
        $details = $this->input->post('details');
        $user_id = $this->session->userdata('user_id');
        $st = $this->session->userdata('user_name');
        $status = 0;

        $result = $this->record_model->post_apply($title,$time,$details,$user_id,$st,$status);
        if($result){
            $this->load->view('index.php');
        }else{
            echo '申请失败';
        }
    }
    public function shenhe(){
        $result = $this->record_model->get_all();
        $arr['result'] = $result;
        $this->load->view('shenhe_rec.php',$arr);
    }
    public function pass_apply(){
        $record_id = $this->input->get('record_id');
        $status = 1;
        $result = $this->record_model->pass_apply($record_id,$status);
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
            $result = $this->record_model->get_by_id($user_id);
            $arr['result'] = $result;
            $this->load->view('record_history.php',$arr);
        }else if($user_flag = 2){
            $result = $this->record_model->get_by_status();
            $arr['result'] = $result;
            $this->load->view('record_history.php',$arr);
        }
    }
    public function return_apply(){
        $record_id = $this->input->get('record_id');
        $status = 2;

        $result = $this->record_model->return_apply($record_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '退回失败';
        }
    }
}
?>
