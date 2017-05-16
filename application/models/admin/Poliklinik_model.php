<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poliklinik_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('*');
		$this->db->from('hospital_poliklinik');
		$this->db->order_by('poliklinik_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {		
		$data = array(
				'poliklinik_name'			=> strtoupper(trim($this->input->post('name'))),
				'poliklinik_name_seo'		=> seo_title($this->input->post('name')),
		   		'poliklinik_date_update' 	=> date('Y-m-d'),
		   		'poliklinik_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_poliklinik', $data);
	}	

	function update_data() {
		$poliklinik_id     = $this->input->post('id');
		
		$data = array(
				'poliklinik_name'			=> strtoupper(trim($this->input->post('name'))),
				'poliklinik_name_seo'		=> seo_title($this->input->post('name')),
		   		'poliklinik_date_update' 	=> date('Y-m-d'),
		   		'poliklinik_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('poliklinik_id', $poliklinik_id);
		$this->db->update('hospital_poliklinik', $data);
	}

	function delete_data($kode) {		
		$this->db->where('poliklinik_id', $kode);
		$this->db->delete('hospital_poliklinik');
	}

	function select_ruangan($poliklinik_id) {
		$this->db->select('*');
		$this->db->from('hospital_ruangan');
		$this->db->where('poliklinik_id', $poliklinik_id);
		$this->db->order_by('ruangan_id', 'asc');
		
		return $this->db->get();
	}

	function select_detail($poliklinik_id) {
		$this->db->select('*');
		$this->db->from('hospital_poliklinik');
		$this->db->where('poliklinik_id', $poliklinik_id);
		
		return $this->db->get();
	}

	function insert_data_ruangan() {		
		$data = array(
				'poliklinik_id'			=> $this->uri->segment(4),
				'ruangan_name'			=> strtoupper(trim($this->input->post('name'))),
		   		'ruangan_date_update' 	=> date('Y-m-d'),
		   		'ruangan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_ruangan', $data);
	}

	function update_data_ruangan() {
		$ruangan_id     = $this->input->post('id');
		
		$data = array(
				'ruangan_name'			=> strtoupper(trim($this->input->post('name'))),
		   		'ruangan_date_update' 	=> date('Y-m-d'),
		   		'ruangan_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('ruangan_id', $ruangan_id);
		$this->db->update('hospital_ruangan', $data);
	}

	function delete_data_ruangan($kode) {		
		$this->db->where('ruangan_id', $kode);
		$this->db->delete('hospital_ruangan');
	}
}
/* Location: ./application/model/admin/Poliklinik_model.php */