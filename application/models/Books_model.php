<?php
class Books_model extends MY_model {

    public $book_status = array(1=>'可用',2=>'借出',3=>'下架');
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //列表搜索获取图书
    public function get_books($book_name,$category)
    {
        if(!empty($book_name))
        {
            $this->db->like('book_name',$book_name);
        }
        if(!empty($category))
        {
            $this->db->where('category',$category);
        }
        $query = $this->db->get_where('books')->result_array();
        return $query;
    }

    //根据id获取图书
    public function get_books_by_id($book_id)
    {
        $query = $this->db->get_where('books',array('id'=>$book_id))->row_array();
        return $query;
    }
    
    public function create_book($params)
    {
        $datetime = date('Y-m-d H:i:s');
        $this->db->set('book_name',$params['book_name']);
        $this->db->set('content',$params['content']);
        $this->db->set('category',$params['book_category']);
        $this->db->set('location',$params['location']);
        $this->db->set('create_time',$datetime);
        return $this->db->insert('books');
    }

    //修改图书状态
    public function change_book_status($book_id,$status)
    {
        $data = array('status' => $status);
        $query = $this->db->update('books', $data, "id = ".$book_id);
        return $query;
    }
}