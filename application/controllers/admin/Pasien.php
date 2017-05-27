<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_hospital')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/pasien_model');
	}

	public function index() {
		if($this->session->userdata('logged_in_hospital')) {
			$data['daftarlist'] = $this->pasien_model->select_all()->result();
			$this->template->display('admin/pasien_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		} 
	}
	
	public function editdata($pasien_id) {		
		$data['detail'] 		= $this->pasien_model->select_by_id($pasien_id)->row();
		$data['listProvinsi']   = $this->pasien_model->select_provinsi()->result();
		$data['listIdentitas']  = $this->pasien_model->select_identitas()->result();
		$data['listAgama']      = $this->pasien_model->select_agama()->result();
		$data['listDarah']      = $this->pasien_model->select_darah()->result();
		$data['listDidik']      = $this->pasien_model->select_pendidikan()->result();
		$data['listStatus']     = $this->pasien_model->select_status()->result();
		$data['listKerja']      = $this->pasien_model->select_pekerjaan()->result();
		$data['listPelanggan']  = $this->pasien_model->select_pelanggan()->result();
		$this->template->display('admin/pasien_edit_view', $data);
	}

	// dijalankan saat Provinsi di klik
    public function pilih_kabupaten() {
        $data['listKabupaten']     = $this->pasien_model->select_kabupaten($this->uri->segment(4));
        $this->load->view('v_drop_down_kabupaten', $data);
    }

    // dijalankan saat Kabupaten di klik
    public function pilih_kecamatan() {
        $data['listKecamatan']     = $this->pasien_model->select_kecamatan($this->uri->segment(4));
        $this->load->view('v_drop_down_kecamatan', $data);
    }

	public function updatedata() {		
		$this->pasien_model->update_data();
		$this->session->set_flashdata('notification','Update Data Sukses.');
		redirect(site_url('admin/pasien'));
	}	
}
/* Location: ./application/controller/admin/Pasien.php */