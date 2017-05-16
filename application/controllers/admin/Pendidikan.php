<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/pendidikan_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in_hospital'))
		{
			$data['daftarlist'] = $this->pendidikan_model->select_all()->result();
			$this->template->display('admin/pendidikan_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function savedata() {		
		$this->pendidikan_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/pendidikan'));
	}
	
	public function updatedata() {		
		$this->pendidikan_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/pendidikan'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/pendidikan'));
		} else {
			$this->pendidikan_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/pendidikan'));
		}
	}	
}
/* Location: ./application/controller/admin/Pendidikan.php */