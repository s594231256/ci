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
        !empty($video_name) && $param['video_name'] = $video_name;
        $data['param'] = $param;

        $data['video'] = $this->video_model->get_video($video_name);
        $data['status'] = array(1=>'可用',2=>'下架');

        $data['user_type'] = $this->session->userdata('user_type');

        $this->load->view('templates/header', array('title'=>'视频列表'));
        $this->load->view('video/index', $data);
    }

    public function watch()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['video'] = $this->video_model->get_video_by_id($id);
        $this->video_model->add_video_watch_num($data['video']);
        $this->load->view('video/watch', $data);
    }

    public function create()
    {
//        var_dump($_POST);die;
        $post = $this->input->post();
        if(empty($post))
        {
            $data = array();
            $this->load->view('templates/header', array('title'=>'添加视频'));
            $this->load->view('video/create', $data);
        }else{
            var_dump($post);
        }
    }
}