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

	function insert_message() {		
		$data = array(
				'message_subyek'		=> trim($this->input->post('subject')),
				'message_nama'			=> trim($this->input->post('name')),
				'message_email'			=> trim($this->input->post('email')),
				'message_pesan'			=> trim($this->input->post('message')),
		   		'message_date_post' 	=> date('Y-m-d'),
		   		'message_time_post' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_message', $data);
	}
}
/* Location: ./application/model/Home_model.php */