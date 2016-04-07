<?php
class Books extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->model('category_model');
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
}