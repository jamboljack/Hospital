<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step_four_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_detail_antrian($antrian_id) {
		$this->db->select('*');
		$this->db->from('hospital_antrian');
		$this->db->where('antrian_id', $antrian_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/model/Step_four_model.php */