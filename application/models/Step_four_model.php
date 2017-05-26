<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_four_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_detail_antrian($antrian_id) {
		$this->db->select('a.*, p.*, r.provinsi_nama, k.kabupaten_nama, c.kecamatan_nama, d.dokter_name,
							t.tipe_name, l.pelanggan_name, u.ruangan_name');
		$this->db->from('hospital_antrian a');
		$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
		$this->db->join('hospital_kecamatan c', 'p.kecamatan_id = c.kecamatan_id');
		$this->db->join('hospital_kabupaten k', 'p.kabupaten_id = k.kabupaten_id');
		$this->db->join('hospital_provinsi r', 'p.provinsi_id = r.provinsi_id');
		$this->db->join('hospital_dokter d', 'a.dokter_id = d.dokter_id');
		$this->db->join('hospital_tipe_dokter t', 'd.tipe_id = t.tipe_id');
		$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
		$this->db->join('hospital_jadwal j', 'a.jadwal_id = j.jadwal_id');
		$this->db->join('hospital_ruangan u', 'j.ruangan_id = u.ruangan_id');
		$this->db->where('a.antrian_id', $antrian_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Step_four_model.php */