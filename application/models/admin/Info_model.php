<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model {	
	function __construct() {
		parent::__construct();	
	}

	function select_detail($info_id) {
		$this->db->select('*');
		$this->db->from('hospital_info');
		$this->db->where('info_id', $info_id);
		
		return $this->db->get();
	}

	function update_data($info_id = 1) {
		$data = array(
				'info_desc' 	=> trim($this->input->post('desc')),
				'info_update' 	=> date('Y-m-d H:i:s')
			);
		
		$this->db->where('info_id', $info_id);
		$this->db->update('hospital_info', $data);
	}
}
/* Location: ./application/model/admin/Info_model.php */