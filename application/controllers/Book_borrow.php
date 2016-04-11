<?php
class Book_borrow extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->model('category_model');
        $this->load->model('user_model');
        $this->load->model('book_borrow_model');
    }

    //首页列表和搜索
    public function index()
    {
        $user_type = $this->session->userdata('user_type');
        if($user_type == 1)
        {
            //管理员可以看到全部历史记录
            $data['book_borrow_info'] = $this->book_borrow_model->get_all_borrow_history();
        }else{
            //学生只能看到自己的历史记录
            $user_id = $this->session->userdata('userid');
            $data['book_borrow_info'] = $this->book_borrow_model->get_borrow_history($user_id);
        }
        if(!empty($data['book_borrow_info']))
        {
            foreach ($data['book_borrow_info'] as $k=>$v)
            {
                $book = $this->books_model->get_books_by_id($v['book_id']);
                $data['book_borrow_info'][$k]['book_name'] = $book['book_name'];
                
                $user = $this->user_model->get_user_by_id($v['user_id']);
                $data['book_borrow_info'][$k]['user_name'] = $user['username'];
                
                $admin = $this->user_model->get_user_by_id($v['admin_id']);
                $data['book_borrow_info'][$k]['admin'] = $admin['username'];
                
                $status = $this->book_borrow_model->borrow_status;
                $data['book_borrow_info'][$k]['status'] = $status[$v['borrow_status']];
            }
        }

        $this->load->view('templates/header', array('title'=>'历史记录'));
        $this->load->view('book_borrow/index', $data);
    }
}