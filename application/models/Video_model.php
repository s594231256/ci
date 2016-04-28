<?php
class Video_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_video($video_name)
    {
        if(!empty($video_name))
        {
            $this->db->like('video_name',$video_name);
        }
        $query = $this->db->get_where('video')->result_array();
        return $query;
    }

    //根据id获取信息
    public function get_video_by_id($id)
    {
        $query = $this->db->get_where('video',array('id'=>$id))->row_array();
        return $query;
    }

    //观看次数加一
    public function add_video_watch_num($param)
    {
        $data['video_num'] = $param['video_num'] + 1;
        $query = $this->db->update('video', $data, "id = ".$param['id']);
    }
}