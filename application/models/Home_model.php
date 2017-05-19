<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_kelompok() {
		$this->db->select('*');
		$this->db->from('hospital_kelompok');
		$this->db->order_by('kelompok_name', 'asc');
		
		return $this->db->get();
	}

	function select_menu() {
		$this->db->select('*');
		$this->db->from('hospital_menu');
		$this->db->order_by('menu_id', 'asc');
		
		return $this->db->get();
	}

	function select_kontak($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('hospital_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Home_model.php */