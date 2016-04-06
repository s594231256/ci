<?php
class Books extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('books_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        //搜索条件 图书名称和分类
        $param = array();
        $book_name = $this->input->post('book_name');
        $category = $this->input->post('category');

        $data['books'] = $this->books_model->get_books($book_name,$category);

        $this->load->view('templates/header', array('title'=>'图书列表'));
        $this->load->view('books/index', $data);
    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
    }
}