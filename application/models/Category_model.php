<?php
class Category_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //获取所有的分类
    public function get_all_category()
    {
        $query = $this->db->get_where('book_category')->result_array();
        return $query;
    }

    //获取所有的分类 并返回 array(1=>'name1',2=>'name2')
    public function get_category_id_name()
    {
        $query = $this->db->get_where('book_category')->result_array();
        $id_name = array();
        if(!empty($query))
        {
            foreach ($query as $v)
            {
                $id_name[$v['id']] = $v['category_name'];
            }
        }
        return $id_name;
    }

}