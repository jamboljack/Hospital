<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/poliklinik_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] = $this->poliklinik_model->select_all()->result();
			$this->template->display('admin/poliklinik_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function savedata() {		
		$this->poliklinik_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/poliklinik'));
	}
	
	public function updatedata() {		
		$this->poliklinik_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/poliklinik'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/poliklinik'));
		} else {
			$this->poliklinik_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/poliklinik'));
		}
	}

	public function ruangan($poliklinik_id = '') {
		$poliklinik_id 		= $this->uri->segment(4);
		$data['detail']		= $this->poliklinik_model->select_detail($poliklinik_id)->row();
		$data['daftarlist']	= $this->poliklinik_model->select_ruangan($poliklinik_id)->result();
		$this->template->display('admin/ruangan_view', $data);
	}

	public function savedataruang() {		
		$this->poliklinik_model->insert_data_ruangan();
		$this->session->set_flashdata('notification','Simpan Data Ruangan Sukses.');
 		redirect(site_url('admin/poliklinik/ruangan/'.$this->uri->segment(4)));
	}

	public function updatedataruang() {		
		$this->poliklinik_model->update_data_ruangan();
		$this->session->set_flashdata('notification','Update Data Ruangan Sukses.');
		redirect(site_url('admin/poliklinik/ruangan/'.$this->uri->segment(4)));
	}

	public function deletedataruang($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url('admin/poliklinik/ruangan/'.$this->uri->segment(4)));
		} else {
			$this->poliklinik_model->delete_data_ruangan($kode);
			$this->session->set_flashdata('notification','Hapus Data Ruangan Sukses.');
			redirect(site_url('admin/poliklinik/ruangan/'.$this->uri->segment(4)));
		}
	}
}

/* Location: ./application/controller/admin/Poliklinik.php */