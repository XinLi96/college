<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('message_model');
    }
    public function post_mess(){
        $recieve = $this->input->post('recieve');
        $time = $this->input->post('time');
        $details = $this->input->post('details');
        $post = $this->session->userdata('user_name');

        $result = $this->message_model->post_mess($recieve,$time,$details,$post);
        if($result){
            redirect('message/message_history');
        }
    }
    public function message_history(){
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('user_name');
        if($user_id){
            $result = $this->message_model->get_all();
            $arr['result'] = $result;
            $arr['user_name'] = $user_name;
            $this->load->view('message_history.php',$arr);
        }else{
            $this->load->view('login.php');
        }

    }
}
?>
