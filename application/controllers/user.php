<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function login(){//登录用户
        $user_num = $this->input->post('user_num');
        $user_pass = $this->input->post('user_pass');
        $result = $this->user_model->get_name_by_pass($user_num,$user_pass);
        if($result){
            $arr = array(
                'user_name' => $result->user_name,
                'user_flag' => $result->user_flag,
                'user_id' => $result->user_id
            );
            $this->session->set_userdata($arr);//将用户信息存在session中
            $user_flag = $result->user_flag;
            if($user_flag == 2){

            }
            redirect('Welcome/index');
        }else{
            $this->load->view('login.php');
        }
    }
    public function logout(){//用户退出
        $arr = array(
            'user_name' => null,
            'user_id' => 0,//将session状态改变、实现用户退出
            'user_flag' => 100
        );
        $this->session->set_userdata($arr);
        redirect('Welcome/index');
    }
    public function add_user(){//注册社团账号
        $user_num = $this->input->post('num');
        $user_name = $this->input->post('name');
        $user_pass1 = $this->input->post('pass1');
        $user_pass2 = $this->input->post('pass2');
        $flag = 1;

        if($user_pass1 == $user_pass2){
            $result1 = $this->user_model->get_by_num_name($user_num,$user_name);
            if(count($result1) > 0){
                echo '账号或社团名已存在！';
            }else{
                $result = $this->user_model->add_user($user_num,$user_name,$user_pass1,$flag);
                if($result){
                    $this->load->view('login.php');
                }else{
                    echo '注册失败！';
                }
            }

        }else{
            echo '两次密码输入不一致！';
        }
    }
    public function view_st(){
        $result = $this->user_model->get_st();
        $arr['result'] = $result;
        $this->load->view('view_st',$arr);
    }
    public function del_st(){
        $user_id = $this->input->get('user_id');
        $result = $this->user_model->del_st($user_id);
        if($result){
            redirect(user/view_st);
        }else{
            echo '删除失败';
        }
    }
    public function change(){
        $user_id = $this->session->userdata('user_id');
        $result = $this->user_model->get_by_id($user_id);
        $arr['result'] = $result;
        $this->load->view('change.php',$arr);
    }
    public function do_change(){
        $user_id = $this->session->userdata('user_id');
        $user_pass = $this->input->post('user_pass');
        $result = $this->user_model->change($user_id,$user_pass);
        if($result){
            $this->load->view('login.php');
        }else{
            echo '更新失败';
        }
    }
}
?>
