<?php
/*
 * 登录
 */
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $name = $this->session->userdata('username');
        if(!empty($name))
        {
            redirect('frameset');
        }else{
            $this->load->view('login/index');
        }
    }

    public function check_login()
    {
        $name = $this->input->post('username');
 	$password = $this->input->post('password');
        $result = $this->login_model->check_login($name,$password);
        if($result['code'] == 0)
        {
            $this->load->view('login/index',$result);
        }else{
            $this->session->set_userdata(array('username'=>$name));
            //$name = $this->session->userdata('username');
            redirect('frameset');
        }
    }

}