<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
//        $data['title'] = 123;
//        $this->load->view('templates/header', $data);
        $this->load->view('news/index');
    }

}