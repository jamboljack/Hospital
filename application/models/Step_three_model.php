<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_three_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_detail_pasien($pasien_id) {
		$this->db->select('*');
		$this->db->from('hospital_pasien');
		$this->db->where('pasien_id', $pasien_id);
		
		return $this->db->get();
	}

	function select_informasi($info_id = 1) {
		$this->db->select('*');
		$this->db->from('hospital_info');
		$this->db->where('info_id', $info_id);
		
		return $this->db->get();
	}

	function select_pelanggan() {
		$this->db->select('*');
		$this->db->from('hospital_pelanggan');
		$this->db->order_by('pelanggan_id', 'asc');
		
		return $this->db->get();
	}

	function select_poliklinik() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_name', 'asc');
		
		return $this->db->get();
	}

	function select_detail_poliklinik($tipe_id) {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->where('tipe_id', $tipe_id);
		
		return $this->db->get();
	}

	function select_jadwal($hari, $tipe_id) {
		$this->db->select('j.*, d.dokter_name, r.ruangan_name, t.tipe_name');
		$this->db->from('hospital_jadwal j');
		$this->db->join('hospital_ruangan r', 'j.ruangan_id = r.ruangan_id');
		$this->db->join('hospital_dokter d', 'j.dokter_id = d.dokter_id');
		$this->db->join('hospital_tipe_dokter t', 'd.tipe_id = t.tipe_id');
		$this->db->where('j.jadwal_hari', $hari);
		$this->db->where('d.tipe_id', $tipe_id);
		$this->db->order_by('j.jadwal_mulai', 'asc');
			
		return $this->db->get();
	}

	function select_antrian($dokter_id, $tanggal, $jadwal_id) {
		$this->db->select('*');
		$this->db->from('hospital_antrian');
		$this->db->where('dokter_id', $dokter_id);
		$this->db->where('antrian_tanggal', $tanggal);
		$this->db->where('jadwal_id', $jadwal_id);
		$this->db->order_by('antrian_id', 'desc');
		
		return $this->db->get();
	}

	function select_jam_antrian($dokter_id, $tanggal, $jadwal_id) {
		$this->db->select('*');
		$this->db->from('hospital_antrian');
		$this->db->where('dokter_id', $dokter_id);
		$this->db->where('antrian_tanggal', $tanggal);
		$this->db->where('jadwal_id', $jadwal_id);
		$this->db->order_by('antrian_id', 'desc');
		$this->db->limit(1);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Step_three_model.php */