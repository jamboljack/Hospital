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
}
/* Location: ./application/model/admin/Home_model.php */