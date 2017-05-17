<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notice extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notice_model');
    }
    public function post(){
        $title = $this->input->post('title');
        $time = $this->input->post('time');
        $con = $this->input->post('details');

        $result = $this->notice_model->post($title,$time,$con);
        if($result){
            redirect(Welcome/index);
        }else{
            echo '发布公告失败';
        }
    }
    public function notice_history(){
        $result = $this->notice_model->get_all();
        $arr['result'] = $result;
        $this->load->view('notice_history',$arr);
    }
    public function del_id(){
        $notice_id = $this->input->get('notice_id');
        $result = $this->notice_model->del_id($notice_id);
        if($result){
            redirect(Welcome/index);
        }else{
            echo '删除失败';
        }
    }
}
?>
