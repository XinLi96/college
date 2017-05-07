<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Conn extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('con_model');
    }
    public function post_apply(){
        $company = $this->input->post('company');
        $time = $this->input->post('time');
        $user_name = $this->input->post('user');
        $money = $this->input->post('money');
        $user_id = $this->session->userdata('user_id');
        $st = $this->session->userdata('user_name');
        $status = 0;

        $config['upload_path']      = './assets/uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 20000;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('img'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $img_name = $data['upload_data']['file_name'];
//            $this->load->view('con_apply', $data);
        }
        $con_img = 'assets/uploads/'.$img_name;

        $result = $this->con_model->post_apply($company,$time,$user_name,$money,$user_id,$st,$status,$con_img);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '申请发送失败！';
        }
    }
    public function shenhe(){
        $result = $this->con_model->get_all();
        $arr['result'] = $result;
        $this->load->view('shenhe_con.php',$arr);
    }
    public function pass_apply(){
        $con_id = $this->input->get('con_id');
        $status = 1;
        $result = $this->con_model->pass_apply($con_id,$status);
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
            $result = $this->con_model->get_by_id($user_id);
            $arr['result'] = $result;
            $this->load->view('con_history.php',$arr);
        }else if($user_flag = 3){
            $result = $this->con_model->get_by_status();
            $arr['result'] = $result;
            $this->load->view('con_history.php',$arr);
        }
    }
    public function return_apply(){
        $con_id = $this->input->get('con_id');
        $status = 2;

        $result = $this->fd_model->return_apply($con_id,$status);
        if($result){
            redirect('Welcome/index');
        }else{
            echo '退回失败';
        }
    }
}
?>
