<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template_front');
        $this->load->model('home_model');
    }
    
    public function index() {
    	$data['listKelompok'] 	= $this->home_model->select_kelompok()->result();
    	$data['listMenu'] 		= $this->home_model->select_menu()->result();
        $data['kontak']   = $this->home_model->select_kontak()->row();
        $this->template_front->display('home_view', $data);
    }
}
/* Location: ./application/controller/Home.php */