<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('hospital_ruangan');
		$this->db->order_by('ruangan_name','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {		
		$data = array(
				'ruangan_name'			=> strtoupper(trim($this->input->post('name'))),
				'ruangan_name_seo'		=> seo_title($this->input->post('name')),
		   		'ruangan_date_update' 	=> date('Y-m-d'),
		   		'ruangan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_ruangan', $data);
	}	

	function update_data() {
		$ruangan_id     = $this->input->post('id');
		
		$data = array(
				'ruangan_name'			=> strtoupper(trim($this->input->post('name'))),
				'ruangan_name_seo'		=> seo_title($this->input->post('name')),
		   		'ruangan_date_update' 	=> date('Y-m-d'),
		   		'ruangan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('ruangan_id', $ruangan_id);
		$this->db->update('hospital_ruangan', $data);
	}

	function delete_data($kode) {		
		$this->db->where('ruangan_id', $kode);
		$this->db->delete('hospital_ruangan');
	}
}
/* Location: ./application/model/admin/Ruangan_model.php */