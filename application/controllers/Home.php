<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
    }
    
    public function index(){
        $this->template_front->display('home_view');
    }
}
/* Location: ./application/controller/dashboard/Home.php */