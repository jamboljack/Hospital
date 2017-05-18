<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/home_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['TotalRuangan'] 	= $this->home_model->select_count_ruangan()->result();
			$data['TotalSpesialis']	= $this->home_model->select_count_spesialis()->result();
			$data['TotalDokter'] 	= $this->home_model->select_count_dokter()->result();
			$data['TotalUser']   	= $this->home_model->select_count_users()->result();
			$this->template->display('admin/home_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
/* Location: ./application/controller/admin/Home.php */