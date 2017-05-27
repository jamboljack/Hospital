<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_count_ruangan() {
		$this->db->select('*');
		$this->db->from('hospital_ruangan');		
		
		return $this->db->get();
	}

	function select_count_spesialis() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');		
		
		return $this->db->get();
	}

	function select_count_dokter() {
		$this->db->select('*');
		$this->db->from('hospital_dokter');		
		
		return $this->db->get();
	}

	function select_count_users() {
		$this->db->select('*');
		$this->db->from('hospital_users');		
		
		return $this->db->get();
	}

	function select_kelompok() {
		$this->db->select('*');
		$this->db->from('hospital_kelompok');
		$this->db->order_by('kelompok_name', 'asc');
		
		return $this->db->get();
	}

	function select_total($kelompok_id) {
		$this->db->select('a.antrian_id');
		$this->db->from('hospital_antrian a');
		$this->db->join('hospital_pasien p', 'a.pasien_id = p.pasien_id');
		$this->db->join('hospital_pelanggan l', 'p.pelanggan_id = l.pelanggan_id');
		$this->db->join('hospital_kelompok k', 'l.kelompok_id = k.kelompok_id');
		$this->db->where('a.antrian_tanggal', date('Y-m-d'));
		$this->db->where('k.kelompok_id', $kelompok_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/admin/Home_model.php */