<?php
class Crud_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
    }

    //限制访问控制器
    public function permission()
    {
        $user_type = $this->session->userdata('user_type');
        if($user_type == 2)
        {
            echo '您没有权限访问此页面';die;
        }
    }
}