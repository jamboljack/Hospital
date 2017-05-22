<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi_online_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function check_user_account($username, $password) {
		$this->db->select('*');
		$this->db->from('hospital_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);		
		$this->db->where('user_level', 'Pasien');
		$this->db->where('user_status', 'ACTIVE');
		
		return $this->db->get();
	}
		
	function get_user($username) {
		$this->db->select('*');
		$this->db->from('hospital_users');
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function select_agama() {
		$this->db->select('*');
		$this->db->from('hospital_agama');
		$this->db->order_by('agama_name', 'asc');
		
		return $this->db->get();
	}

	function select_darah() {
		$this->db->select('*');
		$this->db->from('hospital_darah');
		$this->db->order_by('darah_name', 'asc');
		
		return $this->db->get();
	}

	function select_pendidikan() {
		$this->db->select('*');
		$this->db->from('hospital_pendidikan');
		$this->db->order_by('pendidikan_name', 'asc');
		
		return $this->db->get();
	}

	function select_status() {
		$this->db->select('*');
		$this->db->from('hospital_status');
		$this->db->order_by('status_name', 'asc');
		
		return $this->db->get();
	}

	function select_pekerjaan() {
		$this->db->select('*');
		$this->db->from('hospital_pekerjaan');
		$this->db->order_by('pekerjaan_name', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Registrasi_online_model.php */