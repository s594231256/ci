<?php
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('crud_model');
        //判断是否登录
        $name = $this->session->userdata('username');
        if(empty($name))
        {
            redirect('login/index');
        }
    }
}