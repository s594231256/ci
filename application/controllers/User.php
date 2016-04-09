<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->model('category_model');
        $this->load->model('user_model');
        $this->load->model('book_borrow_model');
        $this->load->helper('url_helper');
    }

    //首页列表和搜索
    public function index()
    {
        //搜索条件 姓名和学号
        $param = array();
        $user_name= $this->input->post('user_name');
        $student_code = $this->input->post('student_code');
        !empty($user_name) && $param['user_name'] = $user_name;
        !empty($student_code) && $param['student_code'] = $student_code;
        
        $data['user'] = $this->user_model->get_user_student($user_name,$student_code);
        if(!empty($data['user']))
        {
            foreach ($data['user'] as $k=>$v)
            {
                $borrow_info = $this->book_borrow_model->get_borrow_history($v['id']);
                $data['user'][$k]['show_history'] = 0;
                if(!empty($borrow_info))
                {
                    $data['user'][$k]['show_history'] = 1;
                }
            }
        }
        $data['param'] = $param;

        $this->load->view('templates/header', array('title'=>'用户列表'));
        $this->load->view('user/index', $data);
    }

    //新增
    public function create()
    {
        $post = $this->input->post();
        if(empty($post))
        {
            $this->load->view('templates/header', array('title'=>'添加用户'));
            $this->load->view('user/create');
        }else{
            $result = $this->user_model->create_user($post);
            redirect('user');
        }
    }
    
    public function edit()
    {
        $user_id = $this->input->get('user_id');
        $data['user_info'] = $this->user_model->get_user_by_id($user_id);
        
        $this->load->view('templates/header', array('title'=>'修改用户'));
        $this->load->view('user/create',$data);
    }
}