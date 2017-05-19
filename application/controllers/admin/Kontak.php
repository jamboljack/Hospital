<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/kontak_model');
	}
	
	public function index($contact_id = 1){
		if($this->session->userdata('logged_in_hospital')) {	
			$data['detail'] = $this->kontak_model->select_contact($contact_id)->row();
			$this->template->display('admin/kontak_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}	
	
	public function updatedata() {		
		$this->kontak_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url().'admin/kontak');
	}	
}
/* Location: ./application/controllers/admin/Kontak.php */