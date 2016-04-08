<?php
class Login_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function check_login($name,$password)
    {
        $query = $this->db->get_where('user_info', array('username' => $name))->row_array();
        $result = array();
        if(empty($query))
        {
            //用户名不存在
            $result['code'] = 0;
            $result['msg'] = '用户名不存在';
        }else if(md5($password) != $query['password']){
            //密码错误
            $result['code'] = 0;
            $result['msg'] = '密码错误';
        }else if($query['user_type'] != 1){
            //管理员
            $result['code'] = 0;
            $result['msg'] = '该用户不是管理员';
        }else{
            //登录成功
            $result['code'] = 1;
            $result['user_id'] = $query['id'];
            $result['msg'] = '登录成功';
        }
        return $result;
    }
}