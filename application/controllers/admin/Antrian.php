<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/antrian_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['listTipe'] 	= $this->antrian_model->select_tipe()->result();
			$data['daftarlist'] = $this->antrian_model->select_all()->result();
			$this->template->display('admin/antrian_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function caridataantrian($tanggal = '', $tipe_id = '') {
		$tanggal        	= $this->input->post('tgl_periksa');
		$Tgl_periksa    	= date("Y-m-d", strtotime($tanggal));
		$tipe_id        	= $this->input->post('lstSpesialis');
		
		$data['listTipe'] 	= $this->antrian_model->select_tipe()->result();
		$data['daftarlist'] = $this->antrian_model->select_search_data($Tgl_periksa, $tipe_id)->result();
		$this->template->display('admin/antrian_view', $data);
	}

	public function updatedata() {		
		$this->antrian_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/antrian'));
	}
}
/* Location: ./application/controller/admin/Antrian.php */