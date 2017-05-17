<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/dokter_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] 	= $this->dokter_model->select_all()->result();
			$data['listTipe'] 		= $this->dokter_model->select_type()->result();
			$this->template->display('admin/dokter_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function savedata() {		
		$this->dokter_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/dokter'));
	}
	
	public function updatedata() {		
		$this->dokter_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/dokter'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/dokter'));
		} else {
			$this->dokter_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/dokter'));
		}
	}

	public function jadwal($dokter_id = '') {
		$dokter_id 			= $this->uri->segment(4);
		$data['detail']		= $this->dokter_model->select_detail($dokter_id)->row();
		$data['daftarlist']	= $this->dokter_model->select_jadwal($dokter_id)->result();
		$this->template->display('admin/jadwal_view', $data);
	}

	public function adddatajadwal($dokter_id = '') {
		$dokter_id 			= $this->uri->segment(4);
		$data['error']		= false;
		$data['detail']		= $this->dokter_model->select_detail($dokter_id)->row();
		$data['listPoli']	= $this->dokter_model->select_poliklinik()->result();
		$this->template->display('admin/jadwal_add_view', $data);
	}		
}
/* Location: ./application/controller/admin/Dokter.php */