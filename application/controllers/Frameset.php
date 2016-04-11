<?php

class Frameset extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    function index() {
        $this->load->view('frameset/index');
    }
    function top() {
        $this->load->view('frameset/top');
    }
    function menu() {
        $this->load->view('frameset/menu');
    }
    function main() {
        $this->load->view('frameset/main');
    }
    function bottom() {
        $this->load->view('frameset/bottom');
    }
}