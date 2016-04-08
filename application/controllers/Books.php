<?php
class Books extends CI_Controller {

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
        //搜索条件 图书名称和分类
        $param = array();
        $book_name = $this->input->post('book_name');
        $category = $this->input->post('category');
        !empty($book_name) && $param['book_name'] = $book_name;
        !empty($category) && $param['category'] = $category;

        $data['category'] = $this->category_model->get_all_category();
        $data['books'] = $this->books_model->get_books($book_name,$category);
        $data['id_name'] = $this->category_model->get_category_id_name();
        $data['status'] = array(1=>'可用',2=>'借出',3=>'下架');
        $data['param'] = $param;

        $this->load->view('templates/header', array('title'=>'图书列表'));
        $this->load->view('books/index', $data);
    }

    //新增图书
    public function create()
    {
        $post = $this->input->post();
        if(empty($post))
        {
            $data['category'] = $this->category_model->get_all_category();
            $this->load->view('templates/header', array('title'=>'添加图书'));
            $this->load->view('books/create',$data);
        }else{
            $result = $this->books_model->create_book($post);

            redirect('books');
        }
    }

    //借书
    public function book_borrow()
    {
        $book_id = $this->input->get('book_id');
        $student_code = $this->input->get('student_code');
        $back_time = $this->input->get('back_time');

        $data['code'] = 0;

        $book_info = $this->books_model->get_books_by_id($book_id);
        if(empty($book_info))
        {
            $data['msg'] = '获取图书信息失败';
        }else{
            if($book_info['status'] == 2)
            {
                $data['msg'] = '改图书已借出';
            }else if($book_info['status'] == 3)
            {
                $data['msg'] = '改图书已下架';
            }
        }
        if(!empty($data['msg']))
        {
            echo json_encode($data);exit();
        }

        $user_info = $this->user_model->get_user_by_code($student_code);
        if(empty($user_info))
        {
            $data['msg'] = '该学号没有注册';
        }
        if(!empty($data['msg']))
        {
            echo json_encode($data);exit();
        }

        //将图书状态改为借出
        $book_status = $this->books_model->change_book_status($book_id,2);

        if(!$book_status)
        {
            $data['msg'] = '修改图书状态失败';
            echo json_encode($data);exit();
        }
        //关系表中插入一条记录
        $params = array(
            'user_id' => $user_info['id'],
            'book_id' => $book_info['id'],
            'create_time' => date('Y-m-d H:i:s'),
            'expect_back_time' => $back_time,
            'borrow_status' => 1,
            'admin_id' => $this->session->userdata('userid'),
        );
        $borrow = $this->book_borrow_model->create($params);

        if($borrow)
        {
            $data['code'] = 1;
            $data['msg'] = '操作成功';
        }else{
            $data['msg'] = '添加关系表失败';
        }
        echo json_encode($data);exit();

    }

    //还书,返回学生学号
    public function book_back_info()
    {
        $book_id = $this->input->get('book_id');
        $borrow_info = $this->book_borrow_model->get_info_by_bookid($book_id);
        $data['student_code'] = '';
        if(!empty($borrow_info))
        {
            $user_id = $borrow_info['user_id'];
            $user_info = $this->user_model->get_user_by_id($user_id);
            if(!empty($user_info))
            {
                $data['student_code'] = $user_info['student_code'];
                $data['borrow_time'] = $borrow_info['create_time'];
                $data['expect_back_time'] = $borrow_info['expect_back_time'];
            }
        }
        echo json_encode($data);
    }

    //还书，修改状态
    public function book_back()
    {
        $book_id = $this->input->get('book_id');
        $back_status = $this->book_borrow_model->change_back_status($book_id);
        $data['code'] = 0;
        if($back_status)
        {
            $data['code'] = 1;
        }
        echo json_encode($data);
    }

    //图书 上架,下架
    public function book_on_off()
    {
        $book_id = $this->input->get('book_id');
        $book_status = $this->input->get('book_status');
        $res = $this->books_model->change_book_status($book_id,$book_status);
        $data['code'] = 0;
        if($res)
        {
            $data['code'] = 1;
        }
        echo json_encode($data);
    }

}