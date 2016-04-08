<?php
class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->helper('url_helper');
    }

    //首页列表和搜索
    public function index()
    {
        //搜索条件 图书名称和分类
        $param = array();
        $name = $this->input->post('name');
        !empty($name) && $param['name'] = $name;

        $data['category'] = $this->category_model->get_all_category();
        $data['param'] = $param;

        $this->load->view('templates/header', array('title'=>'分类列表'));
        $this->load->view('category/index', $data);
    }

    //新增分类
    public function create()
    {
        $category_name = $this->input->get('category_name');
        $data['code'] = 0;
        if(!empty($category_name))
        {
            $result = $this->category_model->create_category($category_name);
            if($result)
            {
                $data['code'] = 1;
            }
        }
        echo json_encode($data);exit();
    }

    //修改分类
    public function edit()
    {
        $category_id = $this->input->get('category_id');
        $category_name = $this->input->get('category_name');
        $data['code'] = 0;
        if(!empty($category_id) && !empty($category_name))
        {
            $result = $this->category_model->edit_category($category_id,$category_name);
            if($result)
            {
                $data['code'] = 1;
            }
        }
        echo json_encode($data);exit();
    }
}