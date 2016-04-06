<?php
class books_model extends MY_model {

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
//            $query = $this->db->get_where('books',$param)->result_array();
        }
        $query = $this->db->get_where('books')->result_array();
        return $query;
    }
}