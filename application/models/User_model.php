<?php
class User_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_code($student_code)
    {
        $query = $this->db->get_where('user_info', array('student_code' => $student_code))->row_array();
        return $query;
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('user_info', array('id' => $id))->row_array();
        return $query;
    }

}