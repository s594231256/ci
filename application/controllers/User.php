<?php
class User extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->crud_model->permission();
        $this->load->model('books_model');
        $this->load->model('category_model');
        $this->load->model('user_model');
        $this->load->model('book_borrow_model');
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
            $data['title'] = '添加用户';
            $data['act'] = 'create';
            $this->load->view('templates/header', array('title'=>$data['title']));
            $this->load->view('user/create');
        }else{
            if($post['act'] == 'create')
            {
                $result = $this->user_model->create_user($post);
            }else{
                $result = $this->user_model->edit_user($post);
            }
            redirect('user');
        }
    }
    
    public function edit()
    {
        $data['user_id'] = $this->input->get('user_id');
        $data['user_info'] = $this->user_model->get_user_by_id($data['user_id']);
        
        $data['title'] = '添加用户';
        $data['act'] = 'edit';
        $this->load->view('templates/header', array('title'=>$data['title']));
        $this->load->view('user/create',$data);
    }
    
    //借书记录
    public function borrow_history()
    {
        $user_id = $this->input->get('user_id');
        $data['borrow_history'] = $this->book_borrow_model->get_borrow_history($user_id);
        $borrow_status = $this->book_borrow_model->borrow_status;
        if(!empty($data['borrow_history']))
        {
            foreach($data['borrow_history'] as $k=>$v)
            {
                $book_info = $this->books_model->get_books_by_id($v['book_id']);
                $data['borrow_history'][$k]['book_name'] = empty($book_info) ? '' : $book_info['book_name'];
                $data['borrow_history'][$k]['status'] = $borrow_status[$v['borrow_status']];
                $admin = $this->user_model->get_user_by_id($v['admin_id']);
                $data['borrow_history'][$k]['admin'] = empty($admin) ? '' : $admin['username'];
            }
        }
        $data['user_info'] = $this->user_model->get_user_by_id($user_id);
        
        $this->load->view('templates/header', array('title'=>'借书记录'));
        $this->load->view('user/borrow_history', $data);
    }
}