<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/info_model');
	}
	
	public function index($info_id = 1){
		if($this->session->userdata('logged_in_hospital')) {	
			$data['detail'] = $this->info_model->select_detail($info_id)->row();
			$this->template->display('admin/info_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function updatedata() {		
		$this->info_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url().'admin/info');
	}	
}
/* Location: ./application/controllers/admin/Info.php */