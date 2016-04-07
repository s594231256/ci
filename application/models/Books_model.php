<?php
class Books_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

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
}