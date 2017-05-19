<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {	
	function __construct() {
		parent::__construct();	
	}

	function select_contact($contact_id) {
		$this->db->select('*');
		$this->db->from('hospital_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}

	function update_data($contact_id = 1) {
		$data = array(
				'contact_name' 			=> strtoupper(trim($this->input->post('name'))),
				'contact_address' 		=> trim($this->input->post('address')),
				'contact_phone' 		=> trim($this->input->post('phone')),				
				'contact_email' 		=> strtolower(trim($this->input->post('email'))),
				'contact_web' 			=> strtolower(trim($this->input->post('website'))),
				'contact_date_update' 	=> date('Y-m-d'),
				'contact_time_update' 	=> date('Y-m-d H:i:s')
			);
		
		$this->db->where('contact_id', $contact_id);
		$this->db->update('hospital_contact', $data);
	}
}
/* Location: ./application/model/admin/Kontak_model.php */