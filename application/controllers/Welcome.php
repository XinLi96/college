<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /12.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $user_flag = $this->session->userdata('user_flag');

        $this->load->model('notice_model');
        $result1 = $this->notice_model->get_one();
        $arr['notice'] = $result1;

        if($user_flag == 2){//财务部首页待审核数量
            $this->load->model('fd_model');
            $result = $this->fd_model->get_count();
            $arr['num'] = $result->num;
            $this->load->view('index',$arr);
        }
        if($user_flag == 3){//外联部首页待审核数量
            $this->load->model('con_model');
            $result = $this->con_model->get_count();
            $arr['num'] = $result->num;
            $this->load->view('index',$arr);
        }
        if($user_flag == 4){//活动部首页待审核数量
            $this->load->model('active_model');
            $result = $this->active_model->get_count();
            $this->load->model('record_model');
            $result1 = $this->record_model->get_count();
            $arr['num'] = $result->num+$result1->num;
            $this->load->view('index',$arr);
        }
		$this->load->view('index',$arr);
	}
	public function login(){
	    $this->load->view('login');
    }
    public function reg(){
        $this->load->view('reg');
    }
    public function shenhe(){
        $this->load->view('shenhe');
    }
    public function money_apply(){
        $this->load->view('money_apply');
    }
    public function active_apply(){
        $this->load->view('active_apply');
    }
    public function con_apply(){
        $this->load->view('con_apply');
    }
    public function record_apply(){
        $this->load->view('record_apply');
    }
    public function post_notice(){
        $this->load->view('post_notice');
    }
}
