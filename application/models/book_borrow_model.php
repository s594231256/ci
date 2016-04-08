<?php
class book_borrow_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //根据id获取图书
    public function get_info_by_bookid($book_id)
    {
        $query = $this->db->get_where('book_borrow',array('book_id'=>$book_id,'borrow_status'=>1))->row_array();
        return $query;
    }

    //创建借书关系
    public function create($data)
    {
        $query = $this->db->insert('book_borrow', $data);
        return $query;
    }

    //还书 后 修改状态
    public function change_back_status($book_id)
    {
        $data = array(
            'back_time' => date('Y-m-d H:i:s'),
            'borrow_status' => 2,
            'admin_id' => $this->session->userdata('userid')
        );
        //关系表 状态为 归还
        $borrow = $this->db->update('book_borrow', $data, "book_id = ".$book_id);
        if(!$borrow)
        {
            return false;
        }
        //图书表 状态为 可用
        $book = $this->db->update('books', array('status' => 1), "id = ".$book_id);
        if(!$book)
        {
            return false;
        }
        return true;
    }

}