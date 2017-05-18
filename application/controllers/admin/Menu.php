<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');		
		$this->load->model('admin/menu_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] = $this->menu_model->select_all()->result();
			$this->template->display('admin/menu_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function adddata() {
		$data['error']	= false;
		$this->template->display('admin/menu_add_view', $data);
	}
	
	public function savedata() {										
		$this->form_validation->set_rules('title','<b>Menu Title</b>','trim|required|is_unique[hospital_menu.menu_title]');

		if ($this->form_validation->run() == FALSE) {
			$data['error']	= true;
			$this->template->display('admin/menu_add_view', $data);
		} else {
			$this->menu_model->insert_data();
			$this->session->set_flashdata('notification','Save Data Success.');
 			redirect(site_url('admin/menu'));
		}
	}
	
	public function editdata($menu_id) {		
		$data['detail'] = $this->menu_model->select_by_id($menu_id)->row();
		$this->template->display('admin/menu_edit_view', $data);
	}
	
	public function updatedata() {		
		$this->menu_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/menu'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(3));
		
		if ($kode == null) {
			redirect(site_url('admin/menu'));
		} else {
			$this->menu_model->delete_data($kode);
			redirect(site_url('admin/menu'));
		}
	}
}
/* Location: ./application/controller/admin/Menu.php */