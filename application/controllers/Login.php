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

        $this->load->view('login/index');
    }

}