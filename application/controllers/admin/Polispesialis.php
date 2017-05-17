<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polispesialis extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/polispesialis_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] = $this->polispesialis_model->select_all()->result();
			$this->template->display('admin/polispesialis_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}

	public function savedata() {		
		$this->polispesialis_model->insert_data();
		$this->session->set_flashdata('notification','Simpan Data Sukses.');
 		redirect(site_url('admin/polispesialis'));
	}
	
	public function updatedata() {		
		$this->polispesialis_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/polispesialis'));
	}
	
	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));
		
		if ($kode == null) {
			redirect(site_url('admin/polispesialis'));
		} else {
			$this->polispesialis_model->delete_data($kode);
			$this->session->set_flashdata('notification','Hapus Data Sukses.');
			redirect(site_url('admin/polispesialis'));
		}
	}

	public function ruangan($poliklinik_id = '') {
		$poliklinik_id 	= $this->uri->segment(4);
		$data['detail']		= $this->polispesialis_model->select_detail($poliklinik_id)->row();
		$data['daftarlist']	= $this->polispesialis_model->select_ruangan($poliklinik_id)->result();
		$this->template->display('admin/ruangan_view', $data);
	}

	public function savedataruang() {		
		$this->polispesialis_model->insert_data_ruangan();
		$this->session->set_flashdata('notification','Simpan Data Ruangan Sukses.');
 		redirect(site_url('admin/polispesialis/ruangan/'.$this->uri->segment(4)));
	}

	public function updatedataruang() {		
		$this->polispesialis_model->update_data_ruangan();
		$this->session->set_flashdata('notification','Update Data Ruangan Sukses.');
		redirect(site_url('admin/polispesialis/ruangan/'.$this->uri->segment(4)));
	}

	public function deletedataruang($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(5));
		
		if ($kode == null) {
			redirect(site_url('admin/polispesialis/ruangan/'.$this->uri->segment(4)));
		} else {
			$this->polispesialis_model->delete_data_ruangan($kode);
			$this->session->set_flashdata('notification','Hapus Data Ruangan Sukses.');
			redirect(site_url('admin/polispesialis/ruangan/'.$this->uri->segment(4)));
		}
	}
}

/* Location: ./application/controller/admin/Polispesialis.php */