<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/ruangan_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] = $this->ruangan_model->select_all()->result();
			$this->template->display('admin/ruangan_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function savedata() {		
		$this->ruangan_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/ruangan'));
	}
	
	public function updatedata() {		
		$this->ruangan_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/ruangan'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/ruangan'));
		} else {
			$this->ruangan_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/ruangan'));
		}
	}
}

/* Location: ./application/controller/admin/Ruangan.php */