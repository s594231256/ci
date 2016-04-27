<?php
class Video extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('video_model');
    }

    //首页列表和搜索
    public function index()
    {
        //搜索条件 图书名称和分类
        $param = array();
        $video_name = $this->input->post('video_name');
        !empty($book_name) && $param['video_name'] = $video_name;
        $data['param'] = $param;
        
        $data['video'] = $this->video_model->get_video();
        $data['status'] = array(1=>'可用',2=>'下架');
        
        $data['user_type'] = $this->session->userdata('user_type');

        $this->load->view('templates/header', array('title'=>'视频列表'));
        $this->load->view('video/index', $data);
    }
    
    public function watch()
    {
        $data = array();
//        $this->load->view('templates/header', array('title'=>'视频列表'));
        $this->load->view('video/watch', $data);
    }
}