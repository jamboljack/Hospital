<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$this->db->select('d.*, t.tipe_name');
		$this->db->from('hospital_dokter d');
		$this->db->join('hospital_tipe_dokter t', 'd.tipe_id=t.tipe_id');
		$this->db->order_by('d.dokter_id','asc');
		
		return $this->db->get();
	}

	function select_type() {
		$this->db->select('*');
		$this->db->from('hospital_tipe_dokter');
		$this->db->order_by('tipe_id','asc');
		
		return $this->db->get();
	}
	
	function insert_data() {
		$data = array(
				'dokter_name'			=> trim($this->input->post('name')),
				'tipe_id'				=> $this->input->post('lstTipe'),
				'dokter_address'		=> trim($this->input->post('address')),
				'dokter_city'			=> strtoupper(trim($this->input->post('city'))),				
				'dokter_phone'			=> trim($this->input->post('phone')),				
		   		'dokter_date_update' 	=> date('Y-m-d'),
		   		'dokter_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('hospital_dokter', $data);
	}	

	function update_data() {
		$dokter_id     = $this->input->post('id');
		
		$data = array(
				'dokter_name'			=> trim($this->input->post('name')),
				'tipe_id'				=> $this->input->post('lstTipe'),
				'dokter_address'		=> trim($this->input->post('address')),
				'dokter_city'			=> strtoupper(trim($this->input->post('city'))),				
				'dokter_phone'			=> trim($this->input->post('phone')),				
		   		'dokter_date_update' 	=> date('Y-m-d'),
		   		'dokter_time_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('dokter_id', $dokter_id);
		$this->db->update('hospital_dokter', $data);
	}

	function delete_data($kode) {		
		$this->db->where('dokter_id', $kode);
		$this->db->delete('hospital_dokter');
	}

	function select_jadwal($dokter_id) {
		$this->db->select('j.*, p.poliklinik_name, r.ruangan_name');
		$this->db->from('hospital_jadwal j');
		$this->db->join('hospital_ruangan r', 'j.ruangan_id = r.ruangan_id');
		$this->db->join('hospital_poliklinik p', 'j.poliklinik_id = p.poliklinik_id');
		$this->db->where('j.dokter_id', $dokter_id);
		$this->db->order_by('j.jadwal_hari', 'asc');
		
		return $this->db->get();
	}

	function select_detail($dokter_id) {
		$this->db->select('*');
		$this->db->from('hospital_dokter');
		$this->db->where('dokter_id', $dokter_id);
		
		return $this->db->get();
	}

	function select_poliklinik() {
		$this->db->select('*');
		$this->db->from('hospital_poliklinik');
		$this->db->order_by('poliklinik_name', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/model/admin/Dokter_model.php */