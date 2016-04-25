<?php
class Video_model extends MY_model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_video()
    {
        $query = $this->db->get_where('video')->result_array();
        return $query;
    }
}