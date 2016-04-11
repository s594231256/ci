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
    
    //获取类型为学生的用户
    public function get_user_student($user_name,$student_code)
    {
        if(!empty($user_name))
        {
            $this->db->like('username',$user_name);
        }
        if(!empty($student_code))
        {
            $this->db->where('student_code',$student_code);
        }
        $query = $this->db->get_where('user_info')->result_array();
        return $query;
    }
    
    //新建用户
    public function create_user($params)
    {
        $datetime = date('Y-m-d H:i:s');
        $this->db->set('username',$params['user_name']);
        if(!empty($params['student_code']))
        {
            $this->db->set('student_code',$params['student_code']);
        }
        $this->db->set('password',md5($params['password']));
        if(!empty($params['mail']))
        {
            $this->db->set('email',$params['mail']);
        }
        $this->db->set('user_type',$params['user_type']);
        $this->db->set('createtime',$datetime);
        return $this->db->insert('user_info');
    }
    
    //修改用户
    public function edit_user($params)
    {
        $datetime = date('Y-m-d H:i:s');
        $this->db->set('username',$params['user_name']);
        if(!empty($params['student_code']))
        {
            $this->db->set('student_code',$params['student_code']);
        }
        if(!empty($params['mail']))
        {
            $this->db->set('password',md5($params['password']));
        }
        if(!empty($params['mail']))
        {
            $this->db->set('email',$params['mail']);
        }
        $this->db->set('user_type',$params['user_type']);
        $this->db->where('id', $params['user_id']);
        return $this->db->update('user_info');
    }

}